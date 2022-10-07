from urllib import request

r= request("https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search")
list_of_dicts = r.json()
print(type(r))