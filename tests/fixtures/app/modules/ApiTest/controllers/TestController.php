<?php
/**
 * TestController.php
 */

namespace ApiTest\Controllers;

use ApiTest\Services\Exception\ApiException;
use Vegas\Mvc\ControllerAbstract;
use Phalcon\Mvc\Dispatcher;

/**
 * @api(
 *  name='Test',
 *  description='Test API',
 *  version='1.0.0'
 * )
 */
class TestController extends ControllerAbstract
{
    /**
     * @api(
     *  method='GET',
     *  description='Test',
     *  name='Get test object',
     *  url='/api/test/{id}',
     *  params={
     *      {name: 'id', type: 'string', description: 'Test ID'}
     *  },
     *  headers={
     *      {name: 'HTTP_X_AUTH', description: 'Authentication token'}
     *  },
     *  responseCodes=[
     *      {code: 111, type: 'Info', description: 'Connection refused'},
     *      {code: 200, type: 'Success', description: 'OK'},
     *      {code: 300, type: 'Redirect', description: 'Found'},
     *      {code: 404, type: 'Error', description: 'Record not found'},
     *      {code: 500, type: 'Error', description: 'Application error'}
     *  ],
     *  requestFormat='JSON',
     *  requestContentType='application/json',
     *  request={
     *      {name: 'id', type: 'MongoId', description: 'ID of something'}
     *  },
     *  requestExample='{
     *      "id": "123"
     *  }',
     *  responseFormat='JSON',
     *  responseContentType='application/json',
     *  response={
     *      {name: 'test', type: 'Object', description: 'Test object'},
     *      {name: 'test.id', type: 'MongoId', description: 'ID of something'},
     *      {name: 'test.name', type: 'string', description: 'Name of something'}
     *  },
     *  responseExample='{
     *      "test" : {
     *          "id": "123",
     *          "name": "Test"
     *      }
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
                    'id' => '123',
                    'name' => 'Test 1'
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
     *  description='Tests list',
     *  name='Get list of tests',
     *  url='/api/test',
     *  headers={
     *      {name: 'HTTP_X_AUTH', description: 'Authentication token'}
     *  },
     *  responseCodes=[
     *      {code: 500, type: 'Error', description: 'Application error'}
     *  ],
     *  requestFormat='JSON',
     *  requestContentType='application/json',
     *  request='',
     *  requestExample='',
     *  responseFormat='JSON',
     *  responseContentType='application/json',
     *  response=[
     *      {
     *          {name: 'test', type: 'Object', description: 'Test object'},
     *          {name: 'test.id', type: 'MongoId', description: 'ID of something'},
     *          {name: 'test.name', type: 'string', description: 'Name of something'},
     *          {name: 'test.nested', type: 'Object', description: 'Nested object'},
     *          {name: 'test.nested.name', type: 'string', description: 'Name of nested'}
     *      },
     *      {
     *          {name: 'test', type: 'Object', description: 'Test object'},
     *          {name: 'test.id', type: 'MongoId', description: 'ID of something'},
     *          {name: 'test.name', type: 'string', description: 'Name of something'},
     *          {name: 'test.nested', type: 'Object', description: 'Nested object'},
     *          {name: 'test.nested.name', type: 'string', description: 'Name of nested'}
     *      }
     *  ],
     *  responseExample='[
     *      {
     *          "test" : {
     *              "id": "123",
     *              "name": "Test",
     *              "nested": {
     *                  "name" : "Name"
     *              }
     *          }
     *      },
     *      {
     *          "test" : {
     *              "id": "124",
     *              "name": "Test 2",
     *              "nested" : {
     *                  "name" : "Name 2"
     *              }
     *          }
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
                    'id' => '123',
                    'name' => 'Test 1'
                ],
                [
                    'id' => '124',
                    'name' => 'Test 2'
                ]
            );
        } catch (\Exception $e) {
            $response = $this->jsonResponse('');
            $response->setStatusCode(500, 'Application  error');
            return $response;
        }
    }
}