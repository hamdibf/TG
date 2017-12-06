import PIL
from PIL import Image

import requests
import sys
from StringIO import StringIO
import urllib
import os
i01 = Image.open("/var/www/html/tg/old/web/configurateur/trans.png")
final2 = Image.new("RGBA", i01.size)
final2 = Image.alpha_composite(final2, i01)

i02 = Image.open(StringIO(urllib.urlopen(sys.argv[3]).read()))
final2 = Image.alpha_composite(final2, i02)

q = int(sys.argv[2])
try:
	final2.save("/var/www/html/tg/old/web/configurateur/"+sys.argv[1]+"image.png", format='PNG', quality=q)

except IOError as e:
	print "I/O error({0}): {1}".format(e.errno, e.strerror)

