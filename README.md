#INSTALATION
1- go to the public directory and run "php -S localhost:5000"
#Available Routes
1- get localhost:5000/devices -> list of all devices
2- post localhost:5000/devices -> store device with body {"name" : "xxxx"}
3- get localhost:5000/locations -> list of all locations
4- post localhost:5000/locations -> store device with body {"device_id" : "xxxx","x"=>"11", "y":"22"}