# Symfony Microservices 

## Services
- **Users Service**: Handles user creation.
- **Notifications Service**: Logs user creation events.

## Setup

### Prerequisites
- Docker
- Docker Compose

### Running the Application

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/symfony-microservices-example.git
    ```

2. Navigate to the project directory:
    ```sh
    cd symfony-microservices-example
    ```

3. Start the services:
    ```sh
    docker-compose up --build
    ```

4. Access the services:
    - Users Service: `http://localhost:8001`
    - Notifications Service: `http://localhost:8002`

5. RabbitMQ Management Interface: `http://localhost:15672`
    - Username: `guest`
    - Password: `guest`

6. Test the setup:
    - Use Postman or curl to send a POST request to `http://localhost:8001/users` with the appropriate JSON body.
    - Check logs of the notifications service to see if the event was consumed.

## Project Structure

- `users-service/`: Users microservice.
- `notifications-service/`: Notifications microservice.
- `shared/`: Shared resources like RabbitMQ.
- `docker-compose.yml`: Docker Compose configuration.
- `README.md`: Project documentation.

## Environment Variables

- Configure environment variables in the `.env` files within each service directory.
