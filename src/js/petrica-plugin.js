/**
 *  JS logic
 *  Note: I used basic alert function as I consider this test to be basic. If it were a more advanced plugin I would use a modal box aso.
 */
function details(about){
    switch(about) {
        case 'PHP Version': alert(' Version of PHP currently running on this site.');
            break;
        case 'PHP max_execution_time': alert('Maximum amount of time that PHP allows scripts to run. After this limit is reached the script is killed. The more time available the better. 30 seconds is most common though 60 seconds is ideal.');
            break;
        case 'Wordpress Version': alert('Version of WordPress currently running. It is important to keep your WordPress up to date for security & features.');
            break;
        case 'MySQL Version': alert('Version of your database server (mysql) as reported to this script by WordPress.');
            break;

    }
}
