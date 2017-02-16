# Carbon Console

Convert timezones and formats with [Carbon][18] wrapped in a PHP7 command line
[symfony console application][1].

[![Build Status][12]][11]
[![Codecov][16]][14]
[![Latest Stable Version][7]][6]
[![Total Downloads][8]][6]
[![License][9]][6]

## Installation

[Download the latest phar release][6], set it executable,
and move it to a good `PATH`

Here's a oneline `sudo` command to make it available system-wide:

    curl -s -L https://github.com/jpuck/carbon-console/releases/latest | egrep -o '/jpuck/carbon-console/releases/download/[0-9\.]*/carbon.phar' | wget --base=http://github.com/ -i - -O carbon && chmod +x carbon && sudo mv carbon /usr/local/bin/

If you don't have `sudo` privileges, then you can omit the last part
`sudo mv carbon /usr/local/bin/` and just save it somewhere in your user's `PATH`

## Usage

After installing, run the `list` command to see a list of commands:

    carbon list

Use the `help` command to get help with any command's usage:

    carbon help convert

The primary command is `convert` which defaults input time now and output timezone local.

>     Usage:
>       convert [-o|--timezone-out [TIMEZONE-OUT]] [-f|--format-out [FORMAT-OUT]] [--] [<time-in>]...

See the documentation for a list of supported input formats for
[date, time][19], and [timezones][17]. Also see available [output formats][20].

## Examples

For the following examples, my system's local timezone is set to UTC.

When it's 8:00AM in Chicago, what time will it be here?

    carbon convert 8:00AM America/Chicago

>     2017-02-16T14:00:00+00:00 UTC

It's 5:18PM here, so what time is it in Casey Station?

    carbon convert -o Antarctica/Casey

>     2017-02-17T04:18:12+11:00 Antarctica/Casey

When it's 6:00PM here, what time will it be in Casey Station?

    carbon convert 6:00PM -o Antarctica/Casey

>     2017-02-17T05:00:00+11:00 Antarctica/Casey

When it's 6:00PM in Chicago, what time will it be in Casey Station?

    carbon convert 6:00PM America/Chicago -o Antarctica/Casey

>     2017-02-17T11:00:00+11:00 Antarctica/Casey

Let's format that output as 12-hour:minute

    carbon convert 6:00PM America/Chicago -o Antarctica/Casey -f h:iA

>     11:00AM

If you use spaces in your format, make sure to quote the argument.

    carbon convert 6:00PM America/Chicago -o Antarctica/Casey -f 'h:iA l, F j'

>     11:00AM Friday, February 17

[1]:http://symfony.com/doc/current/components/console.html
[6]:https://github.com/jpuck/carbon-console/releases/latest
[7]:https://poser.pugx.org/jpuck/carbon-console/v/stable
[8]:https://img.shields.io/github/downloads/jpuck/carbon-console/total.svg
[9]:https://poser.pugx.org/jpuck/carbon-console/license
[11]:https://travis-ci.org/jpuck/carbon-console
[12]:https://travis-ci.org/jpuck/carbon-console.svg?branch=master
[14]:https://codecov.io/gh/jpuck/carbon-console/branch/master
[16]:https://img.shields.io/codecov/c/github/jpuck/carbon-console/master.svg
[17]:http://php.net/manual/en/timezones.php
[18]:http://carbon.nesbot.com/
[19]:http://php.net/manual/en/datetime.formats.php
[20]:http://php.net/manual/en/function.date.php#refsect1-function.date-parameters
