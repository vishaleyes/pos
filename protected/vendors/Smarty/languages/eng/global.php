<?php
$messages=array(); 
$messages[0]="<img src'"+BASEPATH+"public/images/spinner-small.gif' alt='Loading'>";   
//Todooli
$messages['_PLEASE_ADD_COMMENTS_']="Please add comments.";
$messages['_EMAIL_EMPTY_']="Email can't be empty.";
$messages['_EMAIL_NOT_VALID_']="Please enter valid email.";
$messages['_DUEDATE_EMPTY_']="Please enter duedate.";
$messages['_DUEDATE_NOT_VALID_FORMATE_']="Please enter valid formate of duedate.";
$messages['_PLEASE_FILL_ALL_FIELDS_']="Please add all the fields.";
$messages['_PRIORITY_EMPTY_']="Please select atleast one priority.";
$messages['WRONG_PASSWORD_MSG']="We are sorry. The password you have entered is not correct";
$messages['ERROR_VERIFICATION_MSG']="You have not verified your account yet. Please verify";
$messages['ERROR_STATUS_MSG_0']="Your account has been deactivated by Administrator";
$messages['ACT_MSG']="Please activate your account by clicking on verification link sent to you. Please check your email";
$messages['NAEMAIL_MSG']="The account for this email address is already activated";
$messages['AEMAIL_MSG']="We are sorry. The email address you have specified is not registered";
$messages['PHONE_ERR_MSG']="Phone number already exists";
$messages['SUCCESS_MSG_EMAIL']="We have sent a verification email to your email address. Please activate your account by clicking the URL in the verification email.";
$messages['SUCCESS_MSG_BOTH']="We have sent a verification email to your email address. Please activate your account using verification email or sending the verification code via SMS text 'Activate _token_' to ".SMS_NUMBER;
$messages['SUCCESS_MSG_SMS']="To activate your account, text 'Activate _token_' to ".SMS_NUMBER;
$messages['VERIFY_LOG_MSG']="You have successfully verified your account, Please login to continue";
$messages['LOGIN_MSG']="You have already activated your account, Please login to continue";
$messages['FAIL_MSG']="Verification process failed!";
$messages['NEW_PASS_MSG']="Verification code is sent to your email. Please enter that verification code below to change your password";
$message['_TITLE_REQURED_'] = "Title is required.";
$messages['EMAIL_PHONE_MSG']="The email or phone number you have entered is invalid....";
$messages['CONTACT_US_SUCCESS']="Thank you.We will get back to you as soon as possible.";
$messages['_INVALID_CAPTCHA_']="You entered captcha is not valid.";
$messages['FPASS_SEND_SMS_ERROR']="Forgot password - Failed to send SMS";
$messages['FPASS_SEND_SMS_SUCCESS']="Password sent to your mobile";
$messages['ACCOUNT_ACTIVATION_SUBJECT']=_SITENAME_." Account Confirmation";
$messages['FORGOT_PASSWORD_SUBJECT']=_SITENAME_." Password Reset Request";
$messages['SIGNUP_SEEKER_DETAIL_ADMIN_MSG_SUBJ']=_SITENAME_." seeker signup";
$messages['_SEEKER_ACCOUNT_ACTIVATION_SUBJECT_']=_SITENAME_.' Account Confirmation.';
$messages['_EMAIL_SEND_ERROR_']="Failed to send Email";
$messages['_SIGNUP_SEEKER_DETAIL_ADMIN_MSG_SUBJECT_']=_SITENAME_." seeker signup";
$messages['_ADMIN_EMAIL_']=ADMIN_EMAIL;
$messages['MISSING_PARAMETER']="Missing parameter";
$messages['_VALIDATE_PASSWORD_GT_6_']="Password must be greater than 6 character";
$messages['VALIDATE_TOKEN']="Please enter token";
$messages['NO_USER_METCH']="Please enter valid token";
$messages['_PASSWORD_CHANGE_SUCCESS_']="Your password is changed successfully";
$messages['_CONFIRM_PASSWORD_NOT_MATCH_']="Password and confirm password do not match";
$messages['EMPTY_PHONE']="Please Enter Phone number.";
$messages['ACCOUNT_NOT_AVAILABLE']="Invalid Phone number.";
$messages['ACCOUNT_ALREADY_VERIFIED']="Your account is already verified.";
$messages['SMS_TOKEN_MSG']='To verify the phone number, text "Verify _TOKEN_" to '.SMS_NUMBER;
$messages['ONLY_PHONE_VALIDATE']="Please enter phone number";
$messages['_USER_CONFIRMATION_VERIFY_LINK_']="Verification Link";
$messages['_SEEKER_ACCOUNT_ACTIVATION_SUBJECT_']=_SITENAME_.' Account Confirmation.';
$messages['_SIGNUP_SEEKER_DETAIL_ADMIN_MSG_SUBJECT_']=_SITENAME_." seeker signup";
$messages['_ADD_ACC_MANAGER_PHONE_SMS_'] = "Your "._SITENAME_NO_CAPS_.".com account for _BUSINESS_NAME_ is created. To activate account, text 'verify _TOKEN_' to ".SMS_NUMBER." and contact _ACCOUNT_MANAGER_ for password";

$messages['_TODOTITLE_VALIDATE_']="Please enter title";
$messages['_FNAME_VALIDATE_ACCOUNTMANAGER_']="Please enter first name";
$messages['_LNAME_VALIDATE_ACCOUNTMANAGER_']="Please enter last name";
$messages['_TIMEZONE_']="Please enter timezone";
$messages['_PASSWORD_VALIDATE_ACCOUNTMANAGER_']="Please enter password";
$messages['_PASSWORD_CVALIDATE_ACCOUNTMANAGER_']="Please enter confirm password";
$messages['_PASSWORD_LENGTH_VALIDATE_ACCOUNTMANAGER_']="Password/Confirm password must be 6 or more characters";
$messages['_PASSWORD_METCH_VALIDATE_ACCOUNTMANAGER_']="Passwords do not match";
$messages['_EMAIL_VALIDATE_ACCOUNTMANAGER_']="Enter valid email address.";
$messages['_PHONE_VALIDATE_NOT_VALID_ACCOUNTMANAGER_']="Not valid US number";
$messages['_EMAIL_VALIDATE_ACCOUNT_MANAGER_']="Specify email, phone or both";
$messages['_VALID_US_PHONE_']="Please enter valid US phone number.";
$messages['_CONTACT_US_NAME_VALIDATE_']="Please Enter Your Name. ";
$messages['_CONTACT_US_EMAIL_VALIDATE_']="Please Enter Email.";
$messages['_CONTACT_US_COMMENT_VALIDATE_']="Please Enter Comment.";
$messages['_CONTACT_US_COMMENT_LENGTH_VALIDATE_']="Please Enter minimum 20 characters in Comment.";
$messages['_CONTACT_US_INVALID_EMAIL_VALIDATE_']="Please enter valid email.";
$messages['_SELECT_AT_LEAST_ONE_OCCUPATION_']="Select at least one occupation type.";
$messages['_SELECT_AT_LEAST_ONE_COMMUNICATION_']="Select at least one communication type.";
$messages['_CAPTCHA_NOT_VALID_']="Please enter valid captcha text.";
$messages['_VALIDATE_PASS_CPASS_MATCH_']="Password and confirm password do not match.";
$messages['_NO_LOCATION_CONFIGURE_']='Please add business location for hirenow.';
$messages['_EMAIL_ALREADY_AVAILABLE_']='Email already exist.';
$messages['_TEXT_TO_FORGOT_PASS_SMS_']="Text password command with your new password as argument from your phone to 4086457482. E.g text 'password 123456' to set your new password as 123456.";
$messages['_PHONE_NUMBER_']='Phone Number';
$messages['_EMAIL_']='Email';
$messages['_PASSWORD_']='Password';
$messages['_FIRST_NAME_']='First Name';
$messages['_LAST_NAME_']='Last Name';
$messages['_BUSINESS_NAME_']='Business Name';
$messages['_PASSWORD_CHANGE_SUCCESS_']='Password changed successfully. You can access your account at http://'._SITENAME_NO_CAPS_.'.com using your phone number or email address and this password';

//Email templates
$messages['_ET_ACCOUNT_ACTIVATION_LINK_TPL_']="account-activation-link";
$messages['_ET_FORGOT_PASSWORD_LINK_TPL_']="forgot-password-link";
$messages['_ET_FORGOT_PASSWORD_LINK_TPL_SITE_']="forgot-password-link-site";
$messages['_ET_SIGNUP_SEEKER_DETAIL_ADMIN_MSG_TPL_']='signup-seeker-detail-admin-msg';

//new message after translation
$messages['_ENTER_VALID_PHONE_OR_ALREADY_EXIST_']="Phone number already in use or enter valid  phone number.";
$messages['_OLD_NEW_PASSWORD_SAME_']='Old password and new password should not be same.';
$messages['_PHONE_SUCCESS_']="Phone has been added successfully.";
$messages['_LINK_UPDATE_SUCCESS_']="Updated Successfully.";
$messages['_LINK_NOT_VALID_']="Please enter valid URL for";
$messages['_JUST_NOW_']="just now";
$messages['_SECOND_AGO_']=" second ago";
$messages['_ONE_MINUTE_AGO_']="1 minute ago";
$messages['_MINUTES_AGO_']=" minutes ago";
$messages['_ONE_HOUR_AGO_']="1 hour ago";
$messages['_HOURS_AGO_']=" hours ago";
$messages['_ONE_DAY_AGO_']="1 day ago";
$messages['_DAYS_AGO_']=" days ago";
$messages['_OF_']=" of ";
$messages['_FNAME_VALIDATE_SPECIAL_CHAR_']="Do not use special characters in first name.";
$messages['_LNAME_VALIDATE_SPECIAL_CHAR_']="Do not use special characters in last name.";
$messages['_NAME_VALIDATE_SPECIAL_CHAR_']="Do not use special characters in name.";
$messages['_TODOITEM_TITLE_VALIDATE_SPECIAL_CHAR_']="Do not use special characters in title.";
$messages['_TODOITEM_DESCRIPTION_VALIDATE_SPECIAL_CHAR_']="Do not use special characters in description.";
$messages['_LIMIT_EXISTS_']="Your limit exist.";
$messages['_FIRST_VERIFY_PHONE_']="Please first verify unverified phone.";
$messages['_FNAME_VALIDATE_LENGTH_']="Do not enter first name greater than 50 characters";
$messages['_LNAME_VALIDATE_LENGTH_']="Do not enter last name greater than 50 characters";
$messages['_PASSWORD_VALIDATE_LENGTH_']="Do not enter password greater than 50 characters";
$messages['_EMAIL_VALIDATE_LENGTH_']="Do not enter email address greater than 255 characters";
$messages['_ACTIVATION_LINK_EXPIRE_']="Your activation link is expired please reactive your account.";$messages['_INVALID_PARAMETERS_']="Invalid Parameters";
$messages['_COMMENT_VALIDATE_SPECIAL_CHAR_']="Do not use special characters in comment.";
$messages['_HTTP_BAD_REQUEST_']="HTTP bad request.";
$messages['_NAME_VALIDATE_MAX_LEN_'] = "Name should not be larger than 25 characters.";
$messages['_TITLE_VALIDATE_MAX_LEN_'] = "Title should not be larger than 25 characters.";
$messages['EMAIL_SMS_SEND_ERROR']="Email or SMS sending fail.you can get verification mail by activation account.";
$messages['SMS_SEND_ERROR']="SMS sending fail.you can get verification mail by activation account.";
$messages['_EMAIL_SEND_ERROR_']="Email sending fail.you can get verification mail by activation account";
$messages['_USER_MAIL_ERROR_']="Mail Sending Error.";
$messages['_LOCATION_']="location";
$messages['_LOCATIONS_']="locations";
$messages['_EMAIL_SUBJECT_']="Subject could not be greater than 50 characters";
$messages['_EMPTY_EMAIL_SUBJECT_']="Please enter subject";
$messages['_EMAIL_BODY_']="Message text could not be greater than 120 characters";
$messages['_EMPTY_EMAIL_BODY_']="Please enter message text";
$messages['_NO_SEEKER_SELECTED_']="Please select atleast one seeker";
$messages['_EMAIL_SUBJECT_NO_SPECIAL_CHARACTER_']="No special characters allowed in subject";
$messages['_EMAIL_BODY_NO_SPECIAL_CHARACTER_']="No special characters allowed in message";
$messages['_FILE_UPLOAD_ERROR_']="Fileupload Error";
$messages['_INVALID_EXTENSION_']="Invalid Extension.";
$messages['_LINK_NAME_NOT_FOUND_']="Link name not found.";
$messages['_LINK_FAIL_']="Fail";
$messages['_INVALID_CREDENTIAL_']="You have not provide your creadential";
$messages['_INVALID_CREDENTIAL_']="You have not provide your creadential";
$messages['_GET_NEW_CODE_']="Get new code";
$messages['_LOGIN_MESSAGE_']="Login success";
$messages['_PASSWORD_SUCCESSFULLY_MESSAGE_']="Successfully Changed";
$messages['_PASSWORD_MESSAGE_']="Some Problem in Forgot Password.";
$messages['_AVATAR_UPLOAD_']="Avatar uploaded successfully";
$messages['_INVITE_MESSAGE_']=" already invited.";
$messages['_INVITE_SEND_MESSAGE_']=" invited successfully.";
$messages['_INVITE_INVALID_MESSAGE_']=" invalid email format.";
$messages['_REASSIGN_VALIDATION_']="Cannot reassign to TODO creater";
$messages['_EMPTY_REASSIGN_VALIDATION_']="Please enter assigner email";
$messages['_ADD_TODO_MESSAGE_']="TODO Items added successfully.";
$messages['_TODO_ITEAM_DELETE_']="TODO item delete failed";
$messages['_TODO_ITEAM_DELETE_MESSAGE_']="TODO item deleted successfully";
$messages['_REMINDER_MESSAGE_']="Reminder added successfully";
$messages['_REMINDER_DELETE_MESSAGE_']="Reminder deleted successfully";
$messages['_REMINDER_EDIT_MESSAGE_']="Reminder edited successfully";
$messages['_REMINDER_SEND_MESSAGE_']="Reminder sent successfully";
$messages['_COMMENT_ADD_MESSAGE_']="Comment added successfully";
$messages['_OLD_PASSWORD_']="Old Password is Invalid.";
$messages['_ERROR_PASSWORD_']="Successfully Changed Password.";
$messages['_PROBLEM_PASSWORD_']="Some Problem During Update.";
$messages['_OLD_NEW_PASSWORD_']="New password and Confirm Password are not same";
$messages['_TODO_REASSIGN_']="Your todo item reassigned successfully.";
$messages['_COMMENT_MESSAGE_']="Successfully Added Your Comment.";
$messages['_COMMENT_ERROR_']="Some Problem With Database.";
$messages['_FRIEND_INVITE_']="Your Friend is Successfuly invited.";
$messages['_PROBLEM_PASSWORD_']="Some Problem During Update.";
$messages['_ASSIGN_BACK_']="Assigned back successfully";
$messages['_INVITE_DELETE_']="Invite deleted successfully";
$messages['_INVITE_ACCEPT_']="Invite accepted successfully";
$messages['_ADDTODO_VALIDATION_']="Please enter the list name.";
$messages['_INVITE_VALIDATION_']="Plese Select TODO list";
$messages['_FUNCTION_MISSING_']="function name missing";
$messages['_REQUEST_NOT_FOUND_']="Request Not found";
$messages['_PROFILE_SUCESS_']="Profile updated successfully";
$messages['_RECORD_DELETE_']="Record deleted successfully";
$messages['_ENTER_LIST_']="Please enter list name";
$messages['_EMAIL_VALIDATION_']="Please enter email";
$messages['_ADD_NETWORK_']="Successfully added to your network.";
$messages['_USER_INVITE_']="User invited successfully.";
$messages['_ACCOUNT_DELETE_']="Account successfully deleted";
$messages['_PASSWORD_CHANGE_']="Password changed successfully";
$messages['_REASON_SPECIFY_']="Please specify reason";
$messages['_NETWORK_DELETE_']="Network item deleted successfully";
$messages['_ITEM_DELETE_']="List item deleted successfully";
$messages['_DONT_USE_SPECIAL_CHAR_']="Do not use special characters";
$messages['_REMINDER_ME_MESSAGE_']="Reminder sent successfully.";
$messages['_TODO_REASSIGNED_']="TODO reassigned successfully.";
$messages['_REASON_SPECIAL_CHAR_'] = "No Special Character in Reason.";
$messages['_PLEASE_SELECT_ATLEAST_REMINDER_'] = "Please select atleast one TODO list.";
$messages['_NO_SPECIAL_CHARACTER_REMINDER_NAME_'] = "No special characters for reminder name.";

$messages['_TMP_ALL_REM_ASSIGN_BY_'] = "Assign by";
$messages['_TMP_ALL_REM_LIST_NAME_'] = "List name";
$messages['_TMP_ALL_REM_TITLE_'] = "Title";
$messages['_TMP_ALL_REM_DUE_DATE_'] = "Due date";
$messages['_TMP_ALL_REM_PRIORITY_'] = "Priority";
$messages['_TMP_ALL_REM_STATUS_'] = "Status";
$messages['_TMP_ALL_ASSIGNED_ME_'] = "Assigned by me";
$messages['_TMP_ALL_REM_ASSIGN_TO_'] = "Assign to";
$messages['_TMP_ALL_REM_OTHERS_'] = "Others TODO";
$messages['_TMP_REMINDER_HELLO_'] = "Hello";

$messages['_ASSIGNER_COMMENT_ITEM_COMMENTED_'] = "TODO item commented, that is created by you";
$messages['_ASSIGNEDTO_COMMENT_ITEM_COMMENTED_'] = "TODO item commented, that have been assigned to you";
$messages['_LIMIT_EXIST_'] = "Limit Exist.";
$messages['_TODO_ADD_SUCCESS_'] = "Your TODO list added successfully.<br>";
$messages['_LIST_NAME_EXIT_'] = "Listname already exist.<br>";
$messages['_SUCCESSFULLY_UPDATED_'] = "Sucessfully updated.";
$messages['_INVALID_REQUEST_'] = "Invalid Request";
$messages['_SUCCESS_DELETE_LIST_']="TODO List Successfully Deleted";
$messages['_INVALID_TIMEZONE_']="Invalid timezone selected.";
$messages['_ITEM_LIST_UPDATE_']="List updated for your TODO";
$messages['_ITEM_PRIORITY_UPDATE_']="Priority updated for your TODO";
$messages['_ITEM_TITLE_UPDATE_']="Title updated for your TODO";
$messages['_ITEM_DESCRIPTION_UPDATE_']="Description updated for your TODO";
$messages['_ITEM_DUEDATE_UPDATE_']="Duedate updated for your TODO";
$messages['_ITEM_TODO_UPDATE_']="TODO updated";
$messages['_LANGUAGE_']="Language";


// pos messages.................////

$messages['_TICKET_PENDING_'] = "Ticket is Pending.";
$messages['_PASSWORD_CHANGE_SUCCESS_'] = "Password changed successfully.";
$messages['_PASSWORD_LENGTH_ERROR_']='Password must be 6 or more character.';
$messages['_OLD_PASSWORD_NOT_METCH_']='Please enter correct old password.';
$messages['_BOTH_PASSWORD_NOT_METCH_']='Password and confirm password does not match.';

$messages['_RECORD_INSERT_SUCCESS_'] = "Record inserted successfully.";
$messages['_RECORD_DISCARD_SUCCESS_'] = "Ticket discarded successfully.";
$messages['_PLEASE_ENTER_CORRECT_INVOICE_'] = "Please Enter Correct Invoice Id.";
$messages['_PLEASE_ENTER_CORRECT_UPC_CODE_'] = "Please Enter Correct UPC Code.";
$messages['_PRODUCT_ALREADY_ADDED_'] = "Product Already Added.";
$messages['_STATUS_UPDATE_']="Status updated successfully";
$messages['_LOGIN_ERROR_']="Invalid email or password";
$messages['_LOGIN_ERROR_ONLINE_']="Not Allowed due to unavailability of licence.";
$messages['_PROFILE_UPDATE_SUCCESS_MSG_']="Profile updated successfully.";
$messages['_MESSAGE_SEND_SUCCESS_MSG_']="Message send successfully.";
$messages['_NO_DATA_FOUND_']="No Data Found.";
$messages['_INVALID_USER_ID_']="Invalid User Id.";
$messages['_SUCCESS_UPDATED_MSG_']="Successfully Updated.";
$messages['_MESSAGE_SEND_SUCCESS_MSG_']="Message send successfully.";
$messages['_CNAME_VALIDATE_ACCOUNTMANAGER_']="Please enter company name.";
$messages['_CADDR_VALIDATE_ACCOUNTMANAGER_']="Please enter company address.";
$messages['_IPAD_ORDER_CANCEL_']="Ipad order successfully cancelled.";
$messages['_IPAD_ORDER_DISPATCH_']="Ipad order successfully dispatch.";

return $messages;

?>	
