# Time Converter

[![Build Status][12]][11]
[![Codecov][16]][14]
[![Latest Stable Version][7]][6]
[![Total Downloads][8]][6]
[![License][9]][6]

PHP 7 command line [symfony console application][1]
wrapper for [Carbon][18] to convert time.

----------

## Installation

[Download the latest release][6], set it executable, and move it to a good path. Here's a oneline sudo command:

    curl -s -L https://github.com/jpuck/ctime/releases/latest | egrep -o '/jpuck/ctime/releases/download/[0-9\.]*/ctime.phar' | wget --base=http://github.com/ -i - -O ctime && chmod +x ctime && sudo mv ctime /usr/local/bin/

## Usage

After installing, run the `list` command to see a list of commands:

    ctime list

Use the `help` command to get help with any command's usage:

    ctime help convert

The primary command is `convert` with a default output timezone of UTC.

>     Usage:
>       convert <timezone-in> <time> [<timezone-out>]

See [the documentation][17] for a list of supported timezones.

## Examples

    ctime convert America/Chicago 5:00PM

>     2017-02-15 23:00:00.000000
>     3
>     UTC

[1]:http://symfony.com/doc/current/components/console.html
[6]:https://github.com/jpuck/ctime/releases/latest
[7]:https://poser.pugx.org/jpuck/ctime/v/stable
[8]:https://img.shields.io/github/downloads/jpuck/ctime/total.svg
[9]:https://poser.pugx.org/jpuck/ctime/license
[11]:https://travis-ci.org/jpuck/ctime
[12]:https://travis-ci.org/jpuck/ctime.svg?branch=master
[14]:https://codecov.io/gh/jpuck/ctime/branch/master
[16]:https://img.shields.io/codecov/c/github/jpuck/ctime/master.svg
[17]:http://php.net/manual/en/timezones.php
[18]:http://carbon.nesbot.com/
