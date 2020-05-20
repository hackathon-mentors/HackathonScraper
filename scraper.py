from scraper.base_scraper import HMScraper

s = HMScraper("https://mlh.io/seasons/na-2020/events")
a = s.get_content()
print(a)