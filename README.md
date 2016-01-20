RPC Ace - Blockpioneers - BanzaiBTC Version
==============================

Copyright (c) 2014 - 2016 Robin Leffmann (Original RPC Ace Developer)

Copyright (c) 2015 - 2016 Blockpioneers.info - Bitcointalk: BanzaiBTC (Tuned up RPC Ace)

RPC Ace is a simple alternative block explorer written in PHP. It interacts with block chains entirely via RPC, either against a locally running wallet/daemon or remotely over the Internet.


BanzaiBTC's modifications:
------------------
Seperated explorer php files

New header with coinmarketcap api

Extra rpc outputs added

Added Logo

New layout (Don't mind my crappy .css work :D )


Example: http://www.chipcoin.info/crawler


Setting up the Crawler
------------------

Requires PHP version 5.4 or later, with CURL and JSON support enabled. The Crawler requires no database.

Change the /config/config.php parameters.

    RPC_HOST = '127.0.0.1'              // Host/IP for the daemon
    RPC_PORT = 12345                    // RPC port for the daemon
    RPC_USER = 'username'               // 'rpcuser' from the coin's .conf
    RPC_PASS = 'password'               // 'rpcpassword' from the coin's .conf

    COIN_NAME = 'Somecoin'              // Coin name/title
    COIN_POS = true                    // Set to false for proof-of-work coins

    RETURN_JSON = false                 // Set to true to return JSON instead of PHP arrays
    DATE_FORMAT = 'Y-M-d H:i:s'         // Date format for blocklist
    BLOCKS_PER_LIST = 20                // Number of blocks to collect for the blocklist per page

    // for the example explorer
    COIN_HOME = 'http://www.coin.org/'  // Coin website
    REFRESH_TIME = 180                  // Seconds between automatic HTML page refresh



To get accurate transaction values your block chain must be reindexed (or built from scratch) with full transaction indexing, by setting `txindex=1` in the coin's .conf file.

You might need to tune the rpc requests a little bit. Depending on the source of the coin. Not all coins have the same rpc outputs unfortunately. You can change/lookup the rpc calls and outputs in /inc/base.php . Its best to leave /config/easybitcoin.php as it is. Don't forget to change /inc/blocks.php with your new/updated rpc calls.

Donations
---------

BTC: 1Y7JNwVRvNmEPra8ctDCsdjk8oSgNEAMs

CHIP: CUWdoktH4Gc1eisbfKriRH1Fbx6XpECnH3


License
-------

Original RPC Ace is released under the Creative Commons BY-NC-SA 4.0 license: http://creativecommons.org/licenses/by-nc-sa/4.0/