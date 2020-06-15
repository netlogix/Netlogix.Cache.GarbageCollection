# Netlogix.Cache.GarbageCollection

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
