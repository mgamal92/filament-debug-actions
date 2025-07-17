# Filament Debug Actions

A Laravel + Filament package that provides a set of pre-defined developer actions that can be triggered directly from the Filament admin panel.

## Features

- Clear all Laravel caches
- Restart queue workers
- View failed jobs
- Tail the Laravel log file
- Send test email
- Dump current user
- Show PHP info
- Execute artisan commands
- Dump Eloquent model records
- Environment & permissions check
- Check Redis, S3, Mailgun
- Show DB/Redis active connections
- Run supervisorctl status

## Installation

```bash
composer require mgamal92/filament-debug-actions
```

## Configuration

You can publish the config file and modify the available actions:

```bash
php artisan vendor:publish --tag=filament-debug-actions-config
```

## Usage

Navigate to the `Debug Actions` page in your Filament admin panel to trigger any of the available actions.

## Structure

- `config/filament-debug-actions.php`: defines all available actions
- `src/Actions/`: contains the logic for each action
- `src/Pages/DebugActions.php`: Filament page that lists and runs actions

## Coming Soon

- Modal results viewer
- Action execution history
- Role-based permissions for each action

---

Built with ❤️ by Mohamed Gamal
