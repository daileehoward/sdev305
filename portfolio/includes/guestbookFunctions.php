<?php
    //echo "<p>guestbookFunctions.php is loaded</p>";

    function validName($name)
    {
        if (!empty(trim($name)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function validEmail($email)
    {
        if (!empty(trim($email)))
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    function missingEmail($mailingList, $email)
    {
        if (checked($mailingList))
        {
            if (validEmail($email))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    function validLinkedIn($linkedIn)
    {
        if (!empty(trim($linkedIn)))
        {
            if (startsWith($linkedIn, "http") AND endsWith($linkedIn, ".com"))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    function validMeetingEvent($meetingEvent)
    {
        if ($meetingEvent == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }