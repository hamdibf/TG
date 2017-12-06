from PIL import Image
import requests
import sys
from StringIO import StringIO
import urllib


i02 = Image.open(StringIO(urllib.urlopen(sys.argv[2]).read()));
i03 = Image.open(StringIO(urllib.urlopen(sys.argv[3]).read()));
i04 = Image.open(StringIO(urllib.urlopen(sys.argv[4]).read()));
i05 = Image.open(StringIO(urllib.urlopen(sys.argv[5]).read()));
i06 = Image.open(StringIO(urllib.urlopen(sys.argv[6]).read()));
i07 = Image.open(StringIO(urllib.urlopen(sys.argv[7]).read()));
i08 = Image.open(StringIO(urllib.urlopen(sys.argv[8]).read()));

final2 = Image.new("RGBA", i02.size)
final2 = Image.alpha_composite(final2, i02)
final2 = Image.alpha_composite(final2, i03)
final2 = Image.alpha_composite(final2, i04)
final2 = Image.alpha_composite(final2, i05)
final2 = Image.alpha_composite(final2, i06)
final2 = Image.alpha_composite(final2, i07)
final2 = Image.alpha_composite(final2, i08)


final2.save(sys.argv[1])