#!/usr/bin/env python
# -*- coding: utf-8 -*-

import argparse
from jinja2 import Template
from lxml import etree
import os
import os.path
import requests
import string


def main(args):
    """
    Print out an HTML <ul> element of flights to the given country on
    the given inbound and outbound dates.
    """
    outbound_date = args.departure
    api_key_location = os.path.join(os.path.dirname(os.path.realpath(__file__)), 'skyscanner.key')

    try:
        f = open(api_key_location, 'r')
        api_key = f.read().rstrip()
        f.close()
    except Exception, e:
        print "Could not access API key at " + api_key_location
        raise e

    print get_quotes_html(country_iso_code(args.country), outbound_date, api_key)


def country_iso_code(country_name):
    """
    Looks up the two-letter ISO 3166 code for the given country name.
    """
    try:
        iso_xml = etree.XML(requests.get('http://www.iso.org/iso/home/standards/country_codes/country_names_and_code_elements_xml.htm').content)
    except requests.exceptions.ConnectionError as e:
        raise e

    if country_name in [e.text for e in iso_xml.xpath('/ISO_3166-1_List_en/ISO_3166-1_Entry/ISO_3166-1_Alpha-2_Code_element')] and country_name != None:
        return country_name

    countries = iso_xml.xpath('/ISO_3166-1_List_en/ISO_3166-1_Entry')
    for country in countries:
        if country.xpath('ISO_3166-1_Country_name')[0].text.upper().replace(' ', '') == country_name.upper().replace(' ', ''):
            return country.xpath('ISO_3166-1_Alpha-2_Code_element')[0].text

    raise ValueError('"' + country_name + '" not in ISO 3166 specification. See http://www.iso.org/iso/country_codes')


def get_quotes_html(destination_place, outbound_date, api_key):
    """
    Get Skyscanner's cheapest quotes for the specified destination,
    flying out on the specified day. Does not support return dates. Yet.

    Returns HTML <ul> element as a unicode string.
    """
    assert destination_place != ''
    #TODO: replace these with REs
    if outbound_date == '':
        outbound_date = 'anytime'

    template = get_HTML_template()

    api_url = "http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0"
    country = 'GB'
    currency = 'GBP'
    locale = 'en-GB'
    origin_place = 'EDI'  # Edinburgh Airport

    query_url = string.join([api_url, country, currency, locale, origin_place, destination_place, outbound_date], '/')
    # if query_url[-1] == '/':
    #     del query_url[-1]
    query_url += '?apiKey=' + api_key

    try:
        r = requests.get(query_url)
    except requests.exceptions.ConnectionError, e:
        raise e
    quotes = r.json['Quotes']
    carriers = r.json['Carriers']
    places = r.json['Places']

    flights = []
    for quote in quotes:
        flight = {'currency': currency, 'origin': origin_place}
        flight['price'] = quote['MinPrice']
        flight['booking_link'] = ''

        flight['carrier'] = ''
        carrier_id = quote['OutboundLeg']['CarrierIds'][0]
        for carrier in carriers:
            if carrier['CarrierId'] == carrier_id:
                flight['carrier'] = carrier['Name']
                break

        flight['destination'] = ''
        destination_id = quote['OutboundLeg']['DestinationId']
        for place in places:
            if place['PlaceId'] == destination_id:
                flight['destination'] = place['Name']
                break

        flights.append(flight)

    return template.render(flights=flights)


def get_HTML_template():
    """
    Attempt to load the template HTML file,
    and return a Jinja2 Template object.
    """
    try:
        script_dir = os.path.dirname(os.path.realpath(__file__))
        template_path = os.path.join(script_dir, 'template.html')
        f = open(template_path, 'r')
        return Template(f.read())
        f.close()
    except Exception, e:
        raise e

if __name__ == '__main__':
    parser = argparse.ArgumentParser(description='Print out an HTML <ul> element of flights to the given country on the given inbound and outbound dates.')
    parser.add_argument('country', help="The user's home country")
    parser.add_argument('departure', help='Departure date in YYYY-MM(-DD) format')
    # parser.add_argument('--return-date', type=string, help='Return date in YYYY-MM-DD format')

    args = parser.parse_args()
    main(args)
