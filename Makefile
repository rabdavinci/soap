PORT=80

build:
	docker build -t soap-service:latest .
run:
	docker run -d -p ${PORT}:80 soap-service:latest