<?php

if (! function_exists('upload_file')) {

    function upload_file($file, $file_path, $file_name = '')
    {
        try {
            if ($file_name == '') {
                $name = config('app.name') . time() . '.' . $file->getClientOriginalExtension();
            } else {
                $name = $file_name;
            }
            $file->move($file_path, $name);

            return true;
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}

if (! function_exists('convert_vnd')) {

    function convert_vnd($number)
    {
        try {
            if ($number == '') {
                $vnd = '0 đồng';
            } else {
                $vnd = number_format($number).' đồng';
            }

            return $vnd;
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}

if (! function_exists('average')) {

    function calculate_average($total, $quantum)
    {
        try {
            if ($quantum == 0) {
                return false;
            } else {
                $average = $total/$quantum;
            }

            return round($average, 1);
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}

if (! function_exists('limit_characters')) {

    function limit_characters($content, $limit, $end = '...')
    {
        try {
            $result = str_limit($content, $limit, $end);

            return $result;
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}

if (! function_exists('check_freelancer')) {

    function check_freelancer($user)
    {
        return $user->role == 'freelancer' ? true : false;
    }
}

if (! function_exists('check_customer')) {

    function check_customer($user)
    {
        return $user->role == 'customer' ? true : false;
    }
}

if (! function_exists('check_follow')) {

    function check_follow($follow, $userFollowing, $userFollower)
    {
        try {
            foreach ($follow as $item) {
                if ($item->following_id == $userFollowing && $item->follower_id == $userFollower) {
                    return true;
                }
            }

        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}

if (! function_exists('count_following')) {

    function count_following($follow, $targetUserId)
    {
        try {
            $count = 0;
            foreach ($follow as $item) {
                if ($item->following_id == $targetUserId) {
                    $count++;
                }
            }
            return $count;

        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}

if (! function_exists('count_follower')) {

    function count_follower($follow, $targetUserId)
    {
        try {
            $count = 0;
            foreach ($follow as $item) {
                if ($item->follower_id == $targetUserId) {
                    $count++;
                }
            }
            return $count;

        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}
