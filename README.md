# laravel + react. Starter pack
This is starter pack with php laravel and js react framework.

1. git clone https://github.com/akimmaksimov85/laravel_react_redux.git && cd laravel_react_redux
2. docker-compose up -d --build
3. docker-compose exec backend composer install

Frontend:
http://localhost:30001/

Endpoints:
1. GET http://api.test/api/v1/tasks - get all tasks;
2. GET http://api.test/api/v1/tasks{taskId} - get task by id;
3. POST http://api.test/api/v1/tasks - create task;
4. PUT http://api.test/api/v1/tasks{taskId} - update task by id;
5. DELETE http://api.test/api/v1/tasks{taskId} - delete task by id.
