#!/bin/bash
#
# Windows shell provisioner for Ansible playbooks, based on KSid's
# windows-vagrant-ansible: https://github.com/KSid/windows-vagrant-ansible
#
# @todo - Allow proxy configuration to be passed in via Vagrantfile config.
#
# @see README.md
# @author Jeff Geerling, 2014
# @version 1.0
#

# Uncomment if behind a proxy server.
# export {http,https,ftp}_proxy='http://username:password@proxy-host:80'

# This script was forked from https://github.com/geerlingguy/JJG-Ansible-Windows
# and is now setup to configure an Ubuntu based VM.
# This version can be found at https://github.com/JFMarket/JJG-Ansible-Windows

ANSIBLE_PLAYBOOK=$1
ANSIBLE_HOSTS=$2
TEMP_HOSTS="/tmp/ansible_hosts"

if [ ! -f /vagrant/$ANSIBLE_PLAYBOOK ]; then
  echo "Cannot find Ansible playbook."
  exit 1
fi

if [ ! -f /vagrant/$ANSIBLE_HOSTS ]; then
  echo "Cannot find Ansible hosts."
  exit 2
fi

# Install Ansible and its dependencies if it's not installed already.
if [ ! -f /usr/bin/ansible ]; then
  export DEBIAN_FRONTEND=noninteractive
  echo "Installing Ansible from PPA"
  sudo apt-add-repository ppa:rquillo/ansible
  sudo apt-get update
  sudo apt-get -q -y install ansible
fi

cp /vagrant/${ANSIBLE_HOSTS} ${TEMP_HOSTS} && chmod -x ${TEMP_HOSTS}
echo "Running Ansible provisioner defined in Vagrantfile."
ansible-playbook /vagrant/${ANSIBLE_PLAYBOOK} --inventory-file=${TEMP_HOSTS} --extra-vars "is_windows=true" --connection=local --sudo
rm ${TEMP_HOSTS}
