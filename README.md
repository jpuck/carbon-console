# Time Converter

[![Build Status][12]][11]
[![Codecov][16]][14]
[![Latest Stable Version][7]][6]
[![Total Downloads][8]][6]
[![License][9]][6]

PHP 7 command line [symfony console application][1] to convert time.

----------

## Installation

[Download the latest release][6], set it executable, and move it to a good path. Here's a oneline sudo command:

    curl -s -L https://github.com/jpuck/time-converter/releases/latest | egrep -o '/jpuck/time-converter/releases/download/[0-9\.]*/time-converter.phar' | wget --base=http://github.com/ -i - -O time-converter && chmod +x time-converter && sudo mv time-converter /usr/local/bin/

After installing, run without any arguments to see a list of commands:

    time-converter

Use the `-h` flag with any command to get help with usage:

    time-converter <command> -h

[1]:http://symfony.com/doc/current/components/console.html
[6]:https://github.com/jpuck/time-converter/releases/latest
[7]:https://poser.pugx.org/jpuck/time-converter/v/stable
[8]:https://img.shields.io/github/downloads/jpuck/time-converter/total.svg
[9]:https://poser.pugx.org/jpuck/time-converter/license
[11]:https://travis-ci.org/jpuck/time-converter
[12]:https://travis-ci.org/jpuck/time-converter.svg?branch=master
[14]:https://codecov.io/gh/jpuck/time-converter/branch/master
[16]:https://img.shields.io/codecov/c/github/jpuck/time-converter/master.svg
