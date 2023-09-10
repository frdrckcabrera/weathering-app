<p align="center">
    <img src="https://drive.google.com/file/d/1gZ8NJdrksgNsPpqTPVv22ZD8dl8gl1f-/view?usp=drive_link" width="400" alt="Weathering-App">
</p>

## UI and UX Explanation

Inertia.js and Laravel form an exceptional stack for developing weather applications due to their combined strengths in various aspects of web development. Let's explore why this stack is considered one of the best choices for building weather applications:

Performance: Inertia.js, a library that allows you to build server-driven single-page apps, works seamlessly with Laravel. It significantly reduces the complexity of frontend development while maintaining excellent performance. Weather applications often require real-time updates and smooth interactions, and this stack can deliver just that.

Server-Side Rendering (SSR): Weather data can change frequently, and for users, it's crucial to receive up-to-date information quickly. Laravel's server-side rendering capabilities allow you to dynamically generate weather information on the server and send it to the client, ensuring users always get the latest data without waiting for client-side rendering to catch up.

Data Integration: Weather applications rely heavily on data from external sources such as APIs from weather services. Laravel's powerful HTTP client makes it easy to fetch this data and process it efficiently. Additionally, Laravel's Eloquent ORM facilitates database operations, which can be useful if your application stores historical weather data.

Authentication and Authorization: Laravel provides robust authentication and authorization systems out of the box, which are essential for user accounts and personalized features in weather applications. You can easily implement user registration, login, and access control.

Real-Time Updates: Weather applications can benefit from real-time updates to provide users with live data. Laravel's event broadcasting, when combined with tools like Pusher or WebSocket libraries, enables you to push updates to clients instantly when new weather information becomes available.

Community and Documentation: Both Laravel and Inertia.js have large and active communities. This means you'll find ample resources, plugins, and packages to help you build and extend your weather application. Detailed documentation and community support make it easier for developers to learn and troubleshoot issues.

Security: Weather applications often handle sensitive user data, such as location information. Laravel is known for its robust security features, including protection against common web vulnerabilities like XSS and CSRF attacks. This ensures that your application and user data remain safe.

Scalability: Weather applications can attract a large user base, especially during severe weather events. Laravel's scalability and support for deploying on various hosting platforms make it suitable for handling increased traffic and demand.

Testing: Laravel encourages good testing practices with its built-in testing tools. You can write comprehensive tests to ensure the accuracy and reliability of your weather application, which is crucial when dealing with real-time data.

Frontend Flexibility: Inertia.js allows you to use modern frontend frameworks like Vue.js or React if needed. This flexibility enables you to build interactive and responsive weather dashboards while still benefiting from Laravel's backend capabilities.

In conclusion, the combination of Inertia.js and Laravel provides a powerful, efficient, and developer-friendly stack for building weather applications. It offers the necessary tools and features to deliver real-time weather data, ensure security, and scale your application to meet user demand while maintaining excellent performance. This stack has proven itself in various web development scenarios and is well-suited for the challenges presented by weather applications.

## Laravel 10, Inertia.js, and Vue.js Dockerized Project

This repository contains a Dockerized setup for a Laravel 10 application using Inertia.js for frontend interactions and Vue.js for dynamic components. Docker allows you to easily set up the development environment with all dependencies, making it a breeze to get started with the project.

### Prerequisites

Before you begin, ensure you have the following installed:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Getting Started

1. Clone this repository to your local machine:
```
git clone https://git@github.com:frdrckcabrera/weathering-app.git
cd weathering-app
```

2. Set alias for Sail
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

3. Build and start the Docker containers:
```
sail up
```

4. Install PHP dependencies using Composer:
```
sail composer install
```

5. Generate an application key:
```
sail php artisan key:generate
```

6. Install JavaScript dependencies using npm (or yarn if preferred):
```
sail npm install
```

7. Build the assets
```
sail npm run build
```

10. Access the application in your web browser:
- [Laravel](http://localhost)

### Development
You can start working on the project by editing the Laravel backend code in the src directory and the Vue.js components in the resources/js directory. Changes will be automatically reflected in the Docker container.

### Additional Information
- [Laravel documentation](https://laravel.com/docs)
- [Inertia.js documentation](https://inertiajs.com/)
- [Vue.js documentation](https://vuejs.org/)
- [Docker documentation](https://docs.docker.com/)
- [Docker Compose documentation](https://docs.docker.com/compose/)

### License

This project is open-source and available under the [MIT license](https://opensource.org/licenses/MIT).
