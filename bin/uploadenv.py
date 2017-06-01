#!/usr/bin/python

import argparse
import boto3
import sys
import pdb


parser = argparse.ArgumentParser(description='Upload environment to dynamoDBs.')
parser.add_argument('env_name', metavar='ENV_NAME', 
                    help='the name of the elastic beanstalk environment')
parser.add_argument('env_file', metavar='ENV_FILE_NAME', type=file,
                    help='the name of the file that contains the environmental parameters')
parser.add_argument('--profile', 
                    help='configuration profile name (default is used if missing)')

args = parser.parse_args()


#pdb.set_trace()
data = args.env_file.read()
if None == args.profile:
    client = boto3.client('dynamodb')
else:
    session = boto3.Session(profile_name=args.profile)
    client =  session.client('dynamodb')



client.put_item(TableName='config',Item={"env" : {'S':args.env_name}, 'value' : {'S':data}})



