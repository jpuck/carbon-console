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

[Download the latest phar release][6], set it executable,
and move it to a good `PATH`

Here's a oneline `sudo` command to make it available system-wide:

    curl -s -L https://github.com/jpuck/ctime/releases/latest | egrep -o '/jpuck/ctime/releases/download/[0-9\.]*/ctime.phar' | wget --base=http://github.com/ -i - -O ctime && chmod +x ctime && sudo mv ctime /usr/local/bin/

If you don't have `sudo` privileges, then you can omit the last part
`sudo mv ctime /usr/local/bin/` and just save it somewhere in your user's `PATH`

## Usage

After installing, run the `list` command to see a list of commands:

    ctime list

Use the `help` command to get help with any command's usage:

    ctime help convert

The primary command is `convert` with a default output timezone of UTC and
input time of now.

>     Usage:
>       convert [-o|--timezone-out [TIMEZONE-OUT]] [-f|--format-out [FORMAT-OUT]] [--] [<time-in>]...

See the documentation for a list of supported input formats for
[date, time][19], and [timezones][17]. Also see available [output formats][20].

## Examples

It's 5:18PM here, so what time is it in Casey Station?

    ctime convert -o Antarctica/Casey

>     2017-02-17T04:18:12+11:00 Antarctica/Casey

When it's 6:00PM here, what time will it be in Casey Station?

    ctime convert 6:00PM -o Antarctica/Casey

>     2017-02-17T05:00:00+11:00 Antarctica/Casey

When it's 6:00PM in Chicago, what time will it be in Casey Station?

    ctime convert 6:00PM America/Chicago -o Antarctica/Casey

>     2017-02-17T11:00:00+11:00 Antarctica/Casey

Let's format that output as 12-hour:minute

    ctime convert 6:00PM America/Chicago -o Antarctica/Casey -f h:iA

>     11:00AM

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
[19]:http://php.net/manual/en/datetime.formats.php
[20]:http://php.net/manual/en/function.date.php#refsect1-function.date-parameters
