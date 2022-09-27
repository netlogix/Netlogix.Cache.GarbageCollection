# DEPRECATED: Netlogix.Cache.GarbageCollection

**This package is deprecated. The Flow command to trigger the garbage collection has been integrated into the Flow 6.0 core. This package will remain available for existing setups that depend on it, but no bug fixes or features will be added.**

This package adds a Flow command to trigger garbage collection for a configurable set of cache backends.

Use the following Settings to configure the cache backends to trigger garbage collection on:
```yaml
Netlogix:
  Cache:
    GarbageCollection:
      caches:
        - 'Flow_Session_Storage'
        - 'Flow_Session_MetaData'
```

After that, you can trigger the garbage collection using the Flow command `./flow garbagecollection:run`.
