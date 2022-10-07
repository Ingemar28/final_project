import pandas as pd
import mysql.connector as msql
from mysql.connector import Error

data = pd.read_csv (r'starGO/Park_Locations.csv')   
df = pd.DataFrame(data)

print(df)

try:
    conn = msql.connect(host='localhost', port = 8889, user='dbExample',  
                        password='deco18007180')#give ur username, password
    if conn.is_connected():
        cursor = conn.cursor()
        cursor.execute("CREATE DATABASE ParkLocations")
        print("Database is created")
except Error as e:
    print("Error while connecting to MySQL", e)