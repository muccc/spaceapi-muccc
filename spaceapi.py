#!/usr/bin/env python
# -*- coding: utf-8 -*-

URL = 'http://uberbus.club.muc.ccc.de:8080'

import json
from urllib2 import urlopen

states = {
  'member': {
    'open': True,
    'message': 'members only',
  },
  'public': {
    'open': True,
    'message': 'open for public'
  },
  'party': {
    'open': True,
    'message': 'party!',
  },
}

try:
    state = states.get(urlopen(URL).read().strip(), { 'open': False })
except:
    state = { 'open': None }

data = {
  'api': '0.13',
  'space': 'MuCCC',
  'logo': 'http://muc.ccc.de/lib/tpl/muc3/images/muc3_klein.gif',
  'url': 'https://muc.ccc.de',
  'location': {
    'address': 'Heßstrasse 90, München, Germany',
    'lat': 48.15367,
    'lon': 11.56078,
  },
  'contact': {
    'twitter': '@muccc',
    'irc': 'ircs://irc.darkfasel.net/#ccc',
    'email': 'info@muc.ccc.de',
    'ml': 'talk@lists.muc.ccc.de',
  },
  'issue_report_channels': [ 'email' ],
  'state': state,
  'projects': [
    'https://wiki.muc.ccc.de/projekte',
    'https://github.com/muccc',
  ],
}

print(json.dumps(data))
