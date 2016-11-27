
Nginx IP2Location Module
========================

This is a IP2Location Nginx Module that enables the user to identify the country, region, city, latitude, longitude, zip code, time zone, ISP, domain name, connection type, area code and weather by IP address.

Requirements
------------
1. IP2Location C API library ( from http://www.ip2location.com/developers/c )

2. Nginx (version > 0.5)

Installation
------------
1. Install dependencies:
	```
	# These are for RedHat, CentOS, and Fedora.
	$ sudo yum install wget git gcc-c++ pcre-devel zlib-devel make libtool autoconf automake
	
	# These are for Debian. Ubuntu will be similar.
	$ sudo apt-get install wget git build-essential zlib1g-dev libpcre3 libpcre3-dev libtool autoconf automake
	```
2. Download & Install IP2Location

	```
	$ git clone https://github.com/chrislim2888/IP2Location-C-Library
	$ cd IP2Location-C-Library
	$ autoreconf -i -v --force
	$ ./configure
	$ make
	$ sudo make install
	```
3. Download & Install Nginx & ngx-ip2location

	``` bash
	$ wget http://nginx.org/download/nginx-VERSION.tar.gz 
	$ tar -xvzf nginx-VERSION.tar.gz 
	$ cd nginx-VERSION
	$ ./configure --add-module=/path/to/ngx-ip2location
	# If you want to dynamic load this module(nginx version>= 1.9.11)
	# please use this command.
	# ./configure --add-dynamic-module=/path/to/ngx-ip2location
	$ make
	$ sudo make install
	```


Module Configuration
--------------------
```
Syntax:  ip2location on|off
Default: off
Context: http, server, location
Description: enable or disable ip2location
```
```
Syntax:  ip2location_database path
Default: none
Context: http
Description: specifies the ip2location bin file
```
```
Syntax:  ip2location_access_type file_io|shared_memory|cache_memory
Default: shared_memory
Context: http
Description: specifies to where the iplocation DB file will be loaded.
```
```
Syntax:  ip2location_proxy cidr|address
Default: none
Context: http
Description: sets a list of proxies to translate x-forwarded-for headers for
```
```
Syntax:  ip2location_proxy_recursive on|off
Default: off
Context: http
Description: enables recursive search in the x-forwarded-for address list
```

Variables
---------

```
ip2location_country_short
ip2location_country_long
ip2location_region
ip2location_city
ip2location_isp
ip2location_latitude
ip2location_longitude
ip2location_domain
ip2location_zipcode
ip2location_timezone
ip2location_netspeed
ip2location_iddcode
ip2location_areacode
ip2location_weatherstationcode
ip2location_weatherstationname
ip2location_mcc
ip2location_mnc
ip2location_elevation
ip2location_usagetype
```

Config Example
--------------
nginx.conf.example

Testing (test.php)
------------------
Output for "8.8.8.8" with "ngx_http_realip_module" and "IP2Location DB24 Sample":

```
COUNTRY_SHORT => "US"
COUNTRY_LONG => "United States"
REGION => "California"
CITY => "Mountain View"
ISP => "Google Inc."
LATITUDE => "37.405991"
LONGITUDE => "-122.078514"
DOMAIN => "google.com"
ZIPCODE => "94043"
TIMEZONE => "-07:00"
NETSPEED => "T1"
IDDCODE => "1"
AREACODE => "650"
WEATHERSTATIONCODE => "USCA0746"
WEATHERSTATIONNAME => "Mountain View"
MCC => "-"
MNC => "-"
MOBILEBRAND => "N/A"
ELEVATION => "31.000000"
USAGETYPE => "SES"
```


