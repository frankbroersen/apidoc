<?php
/**
 * NestedController.php
 */

namespace ApiTest\Controllers\V2;

use ApiTest\Services\Exception\ApiException;
use Vegas\Mvc\ControllerAbstract;
use Phalcon\Mvc\Dispatcher;

/**
 * @api(
 *  name='Nested',
 *  description='Nested API',
 *  version='1.0.0'
 * )
 */
class NestedController extends ControllerAbstract
{
    /**
     * @api(
     *  method='GET',
     *  description='Nested',
     *  name='Get nested object',
     *  url='/api/nested/{id}',
     *  params=[
     *      {name: 'id', type: 'string', description: 'Nested ID'}
     *  ],
     *  headers=[
     *      {name: 'HTTP_X_AUTH', description: 'Authentication token'}
     *  ],
     *  responseCodes=[
     *      {code: 404, type: 'Error', description: 'Record not found'},
     *      {code: 500, type: 'Error', description: 'Application error'}
     *  ],
     *  responseFormat='JSON',
     *  responseContentType='application/json',
     *  response=[
     *      {name: 'id', type: 'MongoId', description: 'Nested ID'},
     *      {name: 'name', type: 'string', description: 'Nested name'}
     *  ],
     *  responseExample='{
     *      "id": "456",
     *      "name": "Nested"
     *  }'
     * )
     */
    public function getAction()
    {
        try {
            if (!$this->request->get('id')) {
                throw new ApiException();
            }
            return $this->jsonResponse(
                [
                    'id' => '456',
                    'name' => 'Nested 1'
                ]
            );
        } catch (ApiException $e) {
            $response = $this->jsonResponse('');
            $response->setStatusCode(404, 'Record not found');
            return $response;
        } catch (\Exception $e) {
            $response = $this->jsonResponse('');
            $response->setStatusCode(500, 'Application error');
            return $response;
        }
    }

    /**
     * @api(
     *  method='GET',
     *  description='Nested list',
     *  name='Get list of nested',
     *  url='/api/nested',
     *  headers=[
     *      {name: 'HTTP_X_AUTH', description: 'Authentication token'}
     *  ],
     *  responseCodes=[
     *      {code: 500, type: 'Error', description: 'Application error'}
     *  ],
     *  responseFormat='JSON',
     *  responseContentType='application/json',
     *  response=[
     *      {
     *          {name: 'id', type: 'MongoId', description: 'Nested ID'},
     *          {name: 'name', type: 'string', description: 'Nested name'}
     *      },
     *      {
     *          {name: 'id', type: 'MongoId', description: 'Nested ID'},
     *          {name: 'name', type: 'string', description: 'Nested name'}
     *      }
     *  ],
     *  responseExample='[
     *      {
     *          "id": "456",
     *          "name": "Nested 1"
     *      },
     *      {
     *          "id": "567",
     *          "name": "Nested 2"
     *      }
     *  ]'
     * )
     * @return null|\Phalcon\Http\ResponseInterface
     */
    public function listAction()
    {
        try {
            return $this->jsonResponse(
                [
                    'id' => '456',
                    'name' => 'Nested 1'
                ],
                [
                    'id' => '567',
                    'name' => 'Nested 2'
                ]
            );
        } catch (\Exception $e) {
            $response = $this->jsonResponse('');
            $response->setStatusCode(500, 'Application  error');
            return $response;
        }
    }
}