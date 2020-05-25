from bs4 import BeautifulSoup
import requests

regions = ["na", "eu", "apac"]


# All resultant data is stored in the lists declared on line 8
# TODO Add database that is compatabile with our system
def scrape_league(reg):
    event_texts, start_texts, end_texts, cities_texts, states_texts, links_texts = ([] for i in range(6))
    soup = BeautifulSoup(requests.get("https://mlh.io/seasons/"+reg+"-2020/events").text, 'html.parser')

    for i in soup.find_all("h3", class_="event-name"): event_texts.append(i.text)

    for i in soup.find_all("meta",  itemprop="startDate"): start_texts.append(i.text)

    for i in soup.find_all("meta",  itemprop="endDate"): end_texts.append(i.text)

    for i in soup.find_all("span", itemprop="city"): cities_texts.append(i.text)

    for i in soup.find_all("spam", itemprop="state"): states_texts.append(i.text)

    for i in soup.find_all("a", class_="event-link"): links_texts.append(i.get('href'))


for i in regions:
    scrape_league(i)
