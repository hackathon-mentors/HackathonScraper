import requests
from bs4 import BeautifulSoup as BS


class HMScraper(object):
    feed_name = None

    def __init__(self, endpoint: str):
        self._endpoint = endpoint

    def run(self):
        parsed_result = []
        list_content = self._get_list_page()
        hackathon_page_links = self._parse_list_page(list_content)

    def _get_list_page(self) -> str:
        """
        GETs the listing page's HTML content.

        Returns:
            str - the <body> portion of the response's HTML content.
        """
        try:
            response = requests.get(self._endpoint)
            response.raise_for_status()
        except Exception as e:
            print(str(e))
            return None
        return response.text

    def _parse_list_page(self, html_content: str) -> list:
        """
        Parses through the html_content to get links to view each hackathon page

        Returns:
            list - a list of links to each hackathon's detail page
        """

        if html_content is None:
            return None

    def _get_hackathons_details(self, links: list) -> list:
        """
        GETs HTML contents for hackathon details page links.

        Params:
            links - a list of links to visit

        Returns:
            list - a list of dicts containing information for each hackathon
        """
        pass

    def _parse_hackathon_details(self, html_content: str) -> dict:
        """
        Parses through the html_content to get links to view each hackathon page

        Returns:
            dict - a hackathon's detailed information
        """
        pass

    def _get_mapping(self) -> dict:
        """
        Returns a mapping dict for values to pickle.
        """
        pass
