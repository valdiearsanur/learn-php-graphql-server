<?php

$app->get('/graphql/', Project\Controller\GraphQLController::class . '::getGraphQL');
$app->post('/graphql/', Project\Controller\GraphQLController::class . '::postGraphQL');
