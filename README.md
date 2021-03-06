# Members Tracking Portal

### Status
[![Build Status](https://travis-ci.org/PurdueHackers/MembersPortal.svg?branch=master)](https://travis-ci.org/PurdueHackers/MembersPortal)

## Synopsis

A web application for clubs and organizations to manage their members and events. Members can create accounts and manage their profile (including name, contact info, links, projects, work, and events attended). The portal also includes an event management system, including registration, checkin, attendee messaging, and analytics.  

This project was originally developed for [Purdue Hackers](http://www.purduehackers.com). Purdue Hackers is a community of students who collaborate, learn, and build kick-ass technical projects.  

## Features

- [ ] Meta descriptions for most pages
- [X] Members
	- [X] Register, Login
	- [X] Reset Password
	- [X] Profiles (Password, Picture, About, Links, Resume, Status) + Locations + Projects + Event History
		- [X] Private Profiles
		- [ ] Automatic Status Changes (Member/Inactive/Alumni)
			- [ ] Exclude from Impacted Reports + Emails
		- [ ] Mailing List Integration
	- [X] Map of Members Locations
		- [ ] Location duplicate resolution?
	- [ ] Redesign Profile Page
	- [ ] Unsubscribe from email communications
- [X] Events
	- [X] List, View, (Create, Modify, Delete w/ permission)
	- [X] Register, Apply, Unregister
		- [ ] Manage Applications
		- [ ] Close registration on day after event
	- [X] Record Attendance - Checkin System
		- [ ] Undo Checkin (Delete Checkin Record)
	- [X] Message Attendees
		- [ ] If target > 20 people, require admin approval
	- [ ] Improve Events List Design
		- [ ] Merge Hackathons list into events list
		- [ ] Add filterable event categories
- [X] Projects
	- [X] List, View, Create, Modify, Delete
	- [X] Add/Remove Team Members
- [X] Admin
	- [X] Credential Manager
	- [X] Permissions Manager
	- [X] Analytics
		- [ ] Post-Event Report (various metrics)
		- [ ] Event Metrics Table (# attended, # new attendees, # reoccurring attendees)

## Local Environment Setup - Mac (MAMP)

- [ ] Download and Install [MAMP](https://www.mamp.info/en/)
- [ ] Set MAMP Directory to `./public`
- [ ] Create MySQL Database (use a GUI tool such as [Sequel Pro](http://www.sequelpro.com))
- [ ] Download and Install [Composer](https://getcomposer.org/)
- [ ] Execute `composer install` in the project directory (`php composer.phar install` if using composer.phar)
- [ ] Execute `php artisan key:generate` in the project directory
- [ ] Open `.env` - Fill in your database config and ORG/ADMIN information
- [ ] Execute `php artisan migrate` in the project directory
- [ ] Execute `mkdir -p storage/framework/sessions` and `mkdir -p storage/framework/views` in the project directory
- [ ] Execute `chmod -R 757 storage` in the project directory
- [ ] Start MAMP Servers

## Accessing Portal

- Locally: http://localhost:8888/  

## Contributors

@harrischristiansen [HarrisChristiansen.com](http://www.harrischristiansen.com) (christih@purdue.edu)  

## License

MIT License  

Copyright (c) 2016 [Harris Christiansen](http://www.harrischristiansen.com)  

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:  

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.  

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.  
