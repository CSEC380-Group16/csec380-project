"""
The Python script to test if the web page displays "Hello World"
"""

import urllib3
import pytest
<<<<<<< HEAD

print("Test")
=======
from bs4 import BeautifulSoup

def test():
    http = urllib3.PoolManager()
    response = http.request("GET", "http://localhost")
    soup = BeautifulSoup(response.data, "html.parser")

    assert soup.h1.text.strip() == "Hello World"

if __name__ == '__main__':
    test()
>>>>>>> upstream/master
