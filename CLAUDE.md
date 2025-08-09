# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Common Development Commands

### Local Development Setup
```bash
# Start database and email services
docker compose up -d

# Run database migrations (automatically applied on startup)
# Manual migration: sqlx migrate run

# Start the Rust backend server
cargo run

# Start CSS development (in separate terminal)
npm run dev
```

### Building and Testing
```bash
# Build the Rust application
cargo build --release

# Run tests (limited test coverage)
cargo test

# Build CSS for production
npm run build

# Format Rust code
cargo fmt

# Lint Rust code
cargo clippy
```

### Docker Production Build
```bash
# Build production image
docker build -t johnfreeman-dev .

# Run with production compose
docker compose -f compose.yaml -f production.yaml up
```

## Architecture Overview

This is a personal portfolio/blog site built with a terminal-inspired UI. The architecture follows:

### Backend Stack
- **Web Framework**: Axum 0.7 with async Rust
- **Database**: PostgreSQL via SQLx with compile-time query verification
- **Templates**: Askama for type-safe HTML rendering
- **Authentication**: Custom auth module with session management
- **Email**: Lettre for SMTP integration

### Frontend Stack
- **Styling**: Tailwind CSS with Dracula theme
- **Interactivity**: HTMX for server-side rendering with progressive enhancement
- **JavaScript**: Stimulus.js controllers for client-side behavior
- **Build**: Bun runtime with PostCSS pipeline

### Key Architectural Patterns

1. **Command-Based Navigation**: Site mimics a terminal where pages are accessed via "commands" (about, blog, contact, etc.)

2. **MVC-like Structure**:
   - `controllers.rs`: HTTP request handlers
   - `models.rs`: Database models and business logic
   - `templates.rs`: Askama template structs
   - `routes.rs`: Route definitions and middleware

3. **State Management**: Centralized `App` struct containing:
   - Database connection pool
   - Email client
   - Static asset paths
   - Configuration

4. **Server-Side Rendering**: All pages rendered server-side with HTMX for dynamic updates without full page reloads

5. **Terminal UI Features**:
   - Command input with autocomplete
   - Output history management
   - "Sudo" mode for elevated permissions
   - Clear command functionality

### Database Schema
- Posts table for blog content
- Migrations in `migrations/` directory
- Test fixtures in `src/fixtures/`

### Environment Variables Required
- `DATABASE_URL`: PostgreSQL connection string
- `SMTP_SERVER`, `SMTP_PORT`, `SMTP_USERNAME`, `SMTP_PASSWORD`: Email configuration
- `PORT`: Server port (defaults to 80 in production)
- `PUBLIC_PATH`: Static assets directory

### Development Workflow Notes
- The project uses SQLx's offline mode - query metadata is checked at compile time
- Templates are compiled into the binary via Askama
- CSS changes require running `npm run dev` in watch mode
- Database migrations run automatically on startup
- Mailpit captures all emails in development (accessible at localhost:8025)