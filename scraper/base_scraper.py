import requests


class HMScraper:
    def __init__(self, endpoint: str):
        self._endpoint = endpoint

    def get_content(self):
        try:
            response = requests.get(self._endpoint)
            response.raise_for_status()
        except Exception as e:
            print(str(e))
        return response.content

    def parse_content(self):
        pass

    def _get_mapping(self):
        pass
