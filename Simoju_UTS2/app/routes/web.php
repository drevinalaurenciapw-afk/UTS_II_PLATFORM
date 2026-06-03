$router->get('/monitoring/realtime', 'MonitoringController@realtime');
$router->get('/api/monitoring', 'MonitoringController@api');
$router->get('/monitoring/sync', 'MonitoringController@sync');