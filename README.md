# WAGPT - WhatsApp Poem Sender with ChatGPT

This code generates a poem using the OpenAI API and sends the result via a WhatsApp message using the Fonnte API. You can use a Cron Job to schedule the sending of poems.

## Getting Started

These instructions will help you to run this code on your local machine.

### Prerequisites

- Node.js
- PHP
- npm (Node Package Manager)
- CURL Extension

### Installing with NodeJS

1. Clone this repository to your local machine.
2. Navigate to the project directory using the terminal.
3. Run `npm install` to install all required dependencies.
4. Replace the `YOUR_OPENAI_APIKEY` with your OpenAI API key in the code.
5. Replace the `YOUR_FONNTE_API` with your Fonnte API token in the code.
6. Replace the `TARGET_NUMBER_PHONE` with the target phone number in the code.
7. Run `node puisi.js` to start the program.

### Installing with PHP

1. Clone this repository to your local machine.
2. Navigate to the project directory using the terminal.
3. Run `sudo apt install php-curl` to CURL Extension.
4. Replace the `YOUR_OPENAI_APIKEY` with your OpenAI API key in the code.
5. Replace the `YOUR_FONNTE_API` with your Fonnte API token in the code.
6. Replace the `TARGET_NUMBER_PHONE` with the target phone number in the code.
7. Run `php puisi.php` to start the program.

## Built With

- Node.js - JavaScript runtime environment
- request - HTTP client for Node.js
- PHP 7 or later
- cURL extension for making HTTP requests
- moment-timezone - Parse and display dates in any timezone
- OpenAI API - API for advanced AI models
- Fonnte API - API for sending SMS

## Running into Cron Job

- Every minute : * * * * * php [YOUR_SCRIPT_URL]
- Every hour : 0 * * * * php [YOUR_SCRIPT_URL]
- Every day : 0 0 * * * php [YOUR_SCRIPT_URL]
- Every week : 0 0 * * 0 php [YOUR_SCRIPT_URL]
- Every month : 0 0 1 * * php [YOUR_SCRIPT_URL]
- Every year : 0 0 1 1 * php [YOUR_SCRIPT_URL]

## Author

Tinton Arya Permana Sianturi
