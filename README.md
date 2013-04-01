ceg_hypermarket
===============

Over view

The system is able to keep track of the stock level and price of various items, perform check-out operation for the cashiers at each retail outlets, monitor and adjust the pricing of the item at global scope.


The proposed embedded system consists of 4 main parts, namely cash register, price display, retail outlet server and HQ server. The functionalities of the 4 parts are as follows:
Cash Register: allows checking out of items and support audio cue (reading out item name and price).

Price Display: shows the current price of the item on the item racks and the content can be updated dynamically.

Retail Outlet Server: keeps tracks of transactions performed and communicates with the HQ central server.

HQ Server: contains global database of all items and current goods available at each retail outlet, monitors and adjusts item prices based on stock level.


Website and Database Features


Multi-Stores

The website uses the same set of code base of functions, but different store will contain different item database, which is identified by store ID in the database. By clicking on the icons representing different stores, users are able to view items of one particular store. For now, we have three virtual local stores in HQ database.


Online Administration

Existing admin is able to log in to the website with admin permission. Existing admin can create new admin, store ID will be specified while creating the new admin account. Each admin belongs to his store, and is able to view the transactions records of the particular store.

Each admin can create, edit, search and delete items in the local store’s database, and upload product’s display picture. Each admin can view, search and delete transactions.

Adding a new item to the database is done at the local level. When the new item arrived as the local store, store manager will create a new item in the database, and input other relevant field to complete the information for an item. At the end of the day, after local shop database is synchronized with the HQ database, this change will be reflected.


Synchronization with Shop PC

Admin can synchronize data of new transactions, new members, new items generated from each local shop PC, identified by prefix of file names E.g. 1_newitem.txt, 2_newmember.txt, 3_transaction.txt, with HQ server.

For active pricing, update item database on HQ after local shop PC done daily transaction and generated data file, same naming convention as previous one.

Active pricing algorithm: HQ will get the current stock, minimum stock and price pushed from local shop PC, new_price=old_price×(1-(current_stock-min_stock )/(min_stock)×0.1) When(current_stock<1.1×min_stock), table of items with stock and barcode details will be printed out after synchronizing price with local shop PC to remind HQ manager to order restock for the shop.

When the stock arrives, the manager is able to restock the item at the local shop level by entering barcode and updating the new stock level.

Local Shop PC update member, items data from HQ by call APIs, JSON data will be pulled down and then updated to local shop PC’s database.


Membership

We have implemented the membership features in our system. New members can register at either the shop level (go to customer service counter at the store) or the HQ level(website).

After login to the system, customers are able to view their member points, member level record. Member can edit profile, indicating their interest in accepting marketing emails. Member is identified by 8 digit member card number, point and level system update by checking transactions record updated from local shop PC.


Membership

We have implemented the membership features in our system. New members can register at either the shop level (go to customer service counter at the store) or the HQ level(website).

After login to the system, customers are able to view their member points, member level record. Member can edit profile, indicating their interest in accepting marketing emails. Member is identified by 8 digit member card number, point and level system update by checking transactions record updated from local shop PC.

After a member account has been activated, the system will record down each purchase made by the member, and level of member account will be upgraded with accumulated member points. Member will also enjoy discount while their one-time purchases is above 20 dollars. The discount calculation is as follows:

Total Amount Payable=Total Price Before Discount-[(Total Price Before Discount)/20]×Member Level


Online shopping

Members of CEG-Hypermarket can enjoy online shopping and items delivery service. After adding products and quantity into shopping cart, and click order button, pending item list will be save. After local shop PC synchronized with HQ, local shop PC will get the ordering details. Local shop manager will see the orders from HQ ordered by order’s timestamp and assign staff to deliver the goods ordered as well as collecting money back (total price discounted based on the member’s current level). When the delivery is successfully performed, the records will be logged in local shop PC, then update back to HQ via daily synchronization and admin can view them on the website.
