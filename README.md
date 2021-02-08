# Book
Code Snippets from Building Bitcoin Websites Book

This book was written in late 2015 and early 2016. 

Some references in this book are now outdated. 

One of the most significant changes is the Bitcoin PIP installer no longer works. In order to install bitcoin to your server on the command line follow these steps:

1. `wget https://bitcoincore.org/bin/bitcoin-core-0.20.0/bitcoin-0.20.0-x86_64-linux-gnu.tar.gz`

2. `tar -xvf bitcoin-0.20.0-x86_64-linux-gnu.tar.gz`

3. `sudo install -m 0755 -o root -t /usr/local/bin bitcoin-0.20.0/bin/*`

