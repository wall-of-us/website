# deploy script to elastic beanstalk

# first create zip file and copy to s3


current_branch=`git rev-parse HEAD`
zip_file_name="${current_branch}.zip"
command="git archive -o /tmp/$zip_file_name HEAD"
echo "Zipping archive"
#eval $command

# copy to s3
s3_file_path=`date "+ebs-apps/%Y/%m/%d/${zip_file_name}"`
s3_cp_command="aws s3 cp /tmp/${zip_file_name} s3://wou-storage-bucket/ebs-apps/${s3_file_path}"

echo "copying to s3://wou-storage-bucket/${s3_file_path}"
#eval ${s3_cp_command}

# send to sns topic to publish
last_log_message=`git reflog -1 | sed 's/^.*: //'`
message="${s3_file_path}:${current_branch}:${last_log_message}"
arn="arn:aws:sns:us-west-2:745087045597:stagingupdate"
sns_command="aws sns publish --topic-arn \"${arn}\" --message \"${message}\""
echo "sending to sns, command: '${sns_command}'"
#eval ${sns_command}
