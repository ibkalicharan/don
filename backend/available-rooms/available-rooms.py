import argparse
import os
import os.path
import requests


def main(args):
    """
    Print out JSON of place objects.
    """
    key = get_key('educationhackers')

    try:
        places = requests.get('http://educationhackers.org/api' + '/places.json',
                       data={'token': key})
    except requests.exceptions.ConnectionError, e:
        raise e

    print places.json


def get_key(service_name):
    """ Return the key for the named service as a string.

    Accesses the file named `{service_name}.key` located the same folder
    as this script, and returns the first line.
    """
    key_location = os.path.join(os.path.dirname(os.path.realpath(__file__)),
                                                        service_name + '.key')
    try:
        f = open(key_location, 'r')
        api_key = f.read().strip()
    except Exception, e:
        print "Could not access API key at " + key_location
        raise e
    finally:
        f.close()

    return api_key


if __name__ == '__main__':
    parser = argparse.ArgumentParser(description='Print out JSON of place objects.')

    args = parser.parse_args()
    main(args)
