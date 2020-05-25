from bs4 import BeautifulSoup
from urllib.request import Request, urlopen

# All resultant data is stored in the lists declared on line 8
# TODO Add database that is compatabile with our system
event_texts, start_texts, end_texts, cities_texts, states_texts, links_texts = ([] for i in range(6))
req = Request("https://angelhack.com/global-hackathon-series/",headers={'User-Agent': 'Mozilla/5.0'})
soup = BeautifulSoup(urlopen(req))

location, date, link = ([] for i in range(3))

for i in soup.find_all("tr"):
    c = 0
    for q in i.find_all("td"):
        if c >= 3: c = 0
        if c == 0: location.append(q.get_text())
        elif c == 1: date.append(q.get_text())
        elif q.find('a'): link.append(q.find('a').attrs['href'])
        c += 1

print(link)
