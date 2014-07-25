#!/usr/bin/perl
# $Id: netsmtp.pl,v 1.2 2005/06/27 17:00:19 hallk Exp $
# netsmtp.pl -- demo perl program demonstrating how to send mail.

use Net::SMTP;

print "Content-type: text/html\n\n";
             
$smtp = Net::SMTP->new("localhost", Debug => 1)
    or die "$0: unable to connect to smtp server\n";

# Set sender
$smtp->mail('tsantos@stanford.edu');

# Set recipient
$smtp->to('tsantos@stanford.edu');

# Set body 
$smtp->data("eh, what's up, doc?");

$smtp->quit();

print "Mail sent";