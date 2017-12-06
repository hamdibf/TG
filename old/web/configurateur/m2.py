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
i = 1
if len(sys.argv)>3:
    for x in sys.argv:
		if i>3:
			i02 = Image.open(StringIO(urllib.urlopen(x).read()))
			final2 = Image.alpha_composite(final2, i02)
		i=i+1
q = int(sys.argv[2])
try:
	final2.save("/var/www/html/tg/old/web/configurateur/"+sys.argv[1]+"image.png", format='PNG', quality=q)

#miniature
        basewidth = 300
        img = Image.open("/var/www/html/tg/old/web/configurateur/"+sys.argv[1]+"image.png")
        wpercent = (basewidth / float(img.size[0]))
        hsize = int((float(img.size[1]) * float(wpercent)))
        img = img.resize((basewidth, hsize), PIL.Image.ANTIALIAS)
        img.save("/var/www/html/tg/old/web/configurateur/"+sys.argv[1]+"miniature.png")

#mobile
        basewidth = 600
        img = Image.open("/var/www/html/tg/old/web/configurateur/"+sys.argv[1]+"image.png")
        wpercent = (basewidth / float(img.size[0]))
        hsize = int((float(img.size[1]) * float(wpercent)))
        img = img.resize((basewidth, hsize), PIL.Image.ANTIALIAS)
        img.save("/var/www/html/tg/old/web/configurateur/"+sys.argv[1]+"mobile.png")

except IOError as e:
	print "I/O error({0}): {1}".format(e.errno, e.strerror)

