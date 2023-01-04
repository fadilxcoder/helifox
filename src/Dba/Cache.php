<?php

namespace App\Dba;

class Cache
{
    /**
     * @var resource
     */
    protected $dba;

    /**
     * @var string
     */
    protected $handler;

    /**
     * @var string
     */
    protected $storage;

    /**
     * @param string  $file    the cache-file.
     *
     * @param string  $handler the dba handler.
     *
     * You have to install one of this handlers before use.
     *
     * cdb      = Tiny Constant Database - for reading.
     * cdb_make = Tiny Constant Database - for writing.
     * db4      = Oracle Berkeley DB 4   - for reading and writing.
     * qdbm     = Quick Database Manager - for reading and writing.
     * gdbm     = GNU Database Manager   - for reading and writing.
     * inifile  = Ini File               - for reading and writing.
     * flatfile = default dba extension  - for reading and writing.
     *
     * Use "flatfile" only when you cannot install one, of the libraries
     * required by the other handlers, and when you cannot use bundled cdb handler.
     *
     * @param string  $mode    For read/write access, database creation if it doesn't currently exist.
     *
     * r  = for read access
     * w  = for read/write access to an already existing database
     * c  = for read/write access and database creation if it doesn't currently exist
     * n  = for create, truncate and read/write access
     *
     * When you are absolutely sure that you do not require database locking you can use "-" as suffix.
     *
     * @param boolean $persistently
     *
     * @throws \RuntimeException If no DBA extension or handler installed.
     */
    public function __construct($file, $handler = 'flatfile', $mode = 'c', $persistently = true)
    {
        if (!extension_loaded('dba')) {
            throw new \RuntimeException('missing ext/dba');
        }

        if (!function_exists('dba_handlers') || !in_array($handler, dba_handlers(false))) {
            throw new \RuntimeException("dba-handler '{$handler}' not supported");
        }

        $this->dba = (true === $persistently)
            ? @dba_popen($file, $mode, $handler)
            : @dba_open($file, $mode, $handler);

        if ($this->dba === false) {
            $err = error_get_last();
            throw new \RuntimeException($err['message']);
        }

        $this->storage = $file;
        $this->handler = $handler;
    }

    /**
     * Closes an open dba resource
     *
     * @return void
     */
    public function __destruct()
    {
        $this->closeDba();
    }

    /**
     * @param string   $key
     * @param mixed    $value
     * @param int|bool $ltime Lifetime in seconds otherwise cache forever.
     *
     * @return bool
     */
    public function put($key, $value, $ltime = false)
    {
        try {
            $value = Pack::wrap($value, $ltime);
        } catch (\RuntimeException $ret) {
            return false;
        }

        if (true === $this->has($key)) {
            return dba_replace($key, $value, $this->dba);
        }

        return dba_insert($key, $value, $this->dba);
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    public function forever($key, $value)
    {
        return $this->put($key, $value, false);
    }

    /**
     * @param string $key
     *
     * @return bool|object
     */
    public function get($key)
    {
        $res = $this->fetch($key);

        if (false === $res) {
            return false;
        }

        if (false === $res->ltime || (microtime(true) - $res->mtime) < $res->ltime) {
            return $res->object;
        }

        $this->delete($key);

        return false;
    }

    /**
     * @return string
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param string $key
     *
     * @return Capsule|boolean
     */
    public function fetch($key)
    {
        $fetched = dba_fetch($key, $this->dba);

        if (false === $fetched) {
            return false;
        }

        try {
            return Pack::unwrap($fetched);
        } catch (\RuntimeException $ret) {
            return false;
        }
    }

    /**
     * @param string $key
     *
     * @return boolean
     */
    public function delete($key)
    {
        if (false === is_resource($this->dba)) {
            return false;
        }

        if ($this->erasable()) {
            return dba_delete($key, $this->dba);
        }

        return true;
    }

    /**
     * @param string $key
     *
     * @return boolean
     */
    public function has($key)
    {
        return dba_exists($key, $this->dba);
    }

    /**
     * Close the handler.
     */
    public function closeDba()
    {
        if ($this->dba) {
            dba_close($this->dba);
            $this->dba = null;
        }
    }

    /**
     * @return resource
     */
    public function getDba()
    {
        return $this->dba;
    }

    /**
     * @return \ArrayObject of stored cache ids (string).
     */
    public function getIds()
    {
        $ids = new \ArrayObject();
        $dba = $this->getDba();
        $key = dba_firstkey($dba);

        while ($key !== false && $key !== null) {
            $ids->offsetSet(null, $key);
            $key = dba_nextkey($dba);
        }

        return $ids;
    }

    /**
     * Return an array of metadata for the given cache id.
     *
     * - expire = the expire timestamp
     * - mtime = timestamp of last modification time
     *
     * @param string $key cache id
     *
     * @return array|boolean
     */
    public function getMetaData($key)
    {
        $res = $this->fetch($key);

        if ($res instanceof Capsule) {
            return array(
                'expire' => $res->mtime + $res->ltime,
                'mtime'  => $res->mtime,
            );
        }

        return false;
    }

    /**
     * Ensures if a single cache-item can be deleted.
     *
     * @param null|string $handler
     *
     * @return bool
     */
    public function erasable($handler = null)
    {
        $handler = (!$handler) ? $this->handler : $handler;

        return in_array($handler, array('inifile', 'gdbm', 'qdbm', 'db4'), true);
    }
}
