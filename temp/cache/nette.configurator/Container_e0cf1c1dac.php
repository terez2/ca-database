<?php
// source: /var/www/html/app/config/config.neon
// source: /var/www/html/app/config/local.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_e0cf1c1dac extends Nette\DI\Container
{
	protected $tags = [
		'nette.inject' => [
			'01' => true,
			'02' => true,
			'03' => true,
			'04' => true,
			'05' => true,
			'06' => true,
			'07' => true,
			'08' => true,
			'09' => true,
			'010' => true,
			'application.1' => true,
			'application.2' => true,
			'application.3' => true,
			'application.4' => true,
			'application.5' => true,
			'application.6' => true,
		],
	];

	protected $types = ['container' => 'Nette\DI\Container'];

	protected $aliases = [
		'application' => 'application.application',
		'cacheStorage' => 'cache.storage',
		'database.default' => 'database.default.connection',
		'httpRequest' => 'http.request',
		'httpResponse' => 'http.response',
		'nette.cacheJournal' => 'cache.journal',
		'nette.database.default' => 'database.default',
		'nette.database.default.context' => 'database.default.context',
		'nette.httpRequestFactory' => 'http.requestFactory',
		'nette.latteFactory' => 'latte.latteFactory',
		'nette.mailer' => 'mail.mailer',
		'nette.presenterFactory' => 'application.presenterFactory',
		'nette.templateFactory' => 'latte.templateFactory',
		'nette.userStorage' => 'security.userStorage',
		'router' => 'routing.router',
		'session' => 'session.session',
		'user' => 'security.user',
	];

	protected $wiring = [
		'Nette\DI\Container' => [['container']],
		'Nette\Application\Application' => [['application.application']],
		'Nette\Application\IPresenterFactory' => [['application.presenterFactory']],
		'Nette\Application\LinkGenerator' => [['application.linkGenerator']],
		'Nette\Caching\Storages\IJournal' => [['cache.journal']],
		'Nette\Caching\IStorage' => [['cache.storage']],
		'Nette\Database\Connection' => [['database.default.connection']],
		'Nette\Database\IStructure' => [['database.default.structure']],
		'Nette\Database\Structure' => [['database.default.structure']],
		'Nette\Database\IConventions' => [['database.default.conventions']],
		'Nette\Database\Conventions\DiscoveredConventions' => [['database.default.conventions']],
		'Nette\Database\Context' => [['database.default.context']],
		'Nette\Http\RequestFactory' => [['http.requestFactory']],
		'Nette\Http\IRequest' => [['http.request']],
		'Nette\Http\Request' => [['http.request']],
		'Nette\Http\IResponse' => [['http.response']],
		'Nette\Http\Response' => [['http.response']],
		'Nette\Bridges\ApplicationLatte\ILatteFactory' => [['latte.latteFactory']],
		'Nette\Application\UI\ITemplateFactory' => [['latte.templateFactory']],
		'Nette\Mail\Mailer' => [['mail.mailer']],
		'Nette\Routing\RouteList' => [['routing.router']],
		'Nette\Routing\Router' => [['routing.router']],
		'Nette\Application\IRouter' => [['routing.router']],
		'ArrayAccess' => [
			2 => ['routing.router', '07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Countable' => [2 => ['routing.router']],
		'IteratorAggregate' => [2 => ['routing.router']],
		'Traversable' => [2 => ['routing.router']],
		'Nette\Application\Routers\RouteList' => [['routing.router']],
		'Nette\Security\Passwords' => [['security.passwords']],
		'Nette\Security\IUserStorage' => [['security.userStorage']],
		'Nette\Security\User' => [['security.user']],
		'Nette\Http\Session' => [['session.session']],
		'Tracy\ILogger' => [['tracy.logger']],
		'Tracy\BlueScreen' => [['tracy.blueScreen']],
		'Tracy\Bar' => [['tracy.bar']],
		'App\Models\Entities\BaseEntity' => [['01', '02', '03']],
		'App\Models\Entities\ItemEntity' => [['01']],
		'App\Models\Entities\TimeActivityEntity' => [['02']],
		'App\Models\Entities\ActivityEntity' => [['03']],
		'App\Models\BaseModel' => [['04', '05']],
		'App\Models\ActivitiesModel' => [['04']],
		'App\Models\ItemsModel' => [['05']],
		'App\Services\ItemService' => [['06']],
		'App\Presenters\BasePresenter' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\Application\UI\Presenter' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\Application\UI\Control' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\Application\UI\Component' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\ComponentModel\Container' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\ComponentModel\Component' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\Application\UI\IRenderable' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\ComponentModel\IContainer' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\ComponentModel\IComponent' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\Application\UI\ISignalReceiver' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\Application\UI\IStatePersistent' => [
			2 => ['07', '08', '09', '010', 'application.1', 'application.2', 'application.3'],
		],
		'Nette\Application\IPresenter' => [
			2 => [
				'07',
				'08',
				'09',
				'010',
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
			],
		],
		'App\Presenters\HomepagePresenter' => [2 => ['07']],
		'App\ApiModule\V1Module\Presenters\ModuleBasePresenter' => [2 => ['08', '09', '010']],
		'App\ApiModule\V1Module\Presenters\UsersPresenter' => [2 => ['08']],
		'App\ApiModule\V1Module\Presenters\ItemsPresenter' => [2 => ['09']],
		'App\ApiModule\V1Module\Presenters\OptionsPresenter' => [2 => ['010']],
		'App\Router\RouterFactory' => [['routerFactory']],
		'App\Utils\Json\JsonValidator' => [['jsonValidator']],
		'App\Utils\Json\AttributesValidator' => [['attributesValidator']],
		'App\Presenters\ActivityPresenter' => [2 => ['application.1']],
		'App\Presenters\ApiErrorPresenter' => [2 => ['application.2']],
		'App\Presenters\Error4xxPresenter' => [2 => ['application.3']],
		'App\Presenters\ErrorPresenter' => [2 => ['application.4']],
		'NetteModule\ErrorPresenter' => [2 => ['application.5']],
		'NetteModule\MicroPresenter' => [2 => ['application.6']],
		'Ublaboo\ApiRouter\DI\ApiRoutesResolver' => [['apiRouter.resolver']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
		$this->parameters += [
			'cors' => ['url' => ['http://localhost:4200', 'http://localhost']],
			'appDir' => '/var/www/html/app',
			'wwwDir' => '/var/www/html/www',
			'vendorDir' => '/var/www/html/vendor',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => false,
			'tempDir' => '/var/www/html/app/../temp',
		];
	}


	public function createService01(): App\Models\Entities\ItemEntity
	{
		return new App\Models\Entities\ItemEntity;
	}


	public function createService02(): App\Models\Entities\TimeActivityEntity
	{
		return new App\Models\Entities\TimeActivityEntity;
	}


	public function createService03(): App\Models\Entities\ActivityEntity
	{
		return new App\Models\Entities\ActivityEntity;
	}


	public function createService04(): App\Models\ActivitiesModel
	{
		return new App\Models\ActivitiesModel;
	}


	public function createService05(): App\Models\ItemsModel
	{
		return new App\Models\ItemsModel;
	}


	public function createService06(): App\Services\ItemService
	{
		$service = new App\Services\ItemService;
		$service->jsonValidator = $this->getService('jsonValidator');
		$service->httpRequest = $this->getService('http.request');
		$service->attributesValidator = $this->getService('attributesValidator');
		return $service;
	}


	public function createService07(): App\Presenters\HomepagePresenter
	{
		$service = new App\Presenters\HomepagePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createService08(): App\ApiModule\V1Module\Presenters\UsersPresenter
	{
		$service = new App\ApiModule\V1Module\Presenters\UsersPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->jsonValidator = $this->getService('jsonValidator');
		$service->httpResponse = $this->getService('http.response');
		$service->httpRequest = $this->getService('http.request');
		$service->invalidLinkMode = 5;
		$service->setCorsUrl(['http://localhost:4200', 'http://localhost']);
		return $service;
	}


	public function createService09(): App\ApiModule\V1Module\Presenters\ItemsPresenter
	{
		$service = new App\ApiModule\V1Module\Presenters\ItemsPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->jsonValidator = $this->getService('jsonValidator');
		$service->itemsModel = $this->getService('05');
		$service->itemService = $this->getService('06');
		$service->httpResponse = $this->getService('http.response');
		$service->httpRequest = $this->getService('http.request');
		$service->activitiesModel = $this->getService('04');
		$service->invalidLinkMode = 5;
		$service->setCorsUrl(['http://localhost:4200', 'http://localhost']);
		return $service;
	}


	public function createService010(): App\ApiModule\V1Module\Presenters\OptionsPresenter
	{
		$service = new App\ApiModule\V1Module\Presenters\OptionsPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->httpResponse = $this->getService('http.response');
		$service->httpRequest = $this->getService('http.request');
		$service->invalidLinkMode = 5;
		$service->setCorsUrl(['http://localhost:4200', 'http://localhost']);
		return $service;
	}


	public function createServiceApiRouter__resolver(): Ublaboo\ApiRouter\DI\ApiRoutesResolver
	{
		$service = new Ublaboo\ApiRouter\DI\ApiRoutesResolver;
		$service->prepandRoutes(
			$this->getService('routing.router'),
			[
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => 'readAll',
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users',
					"\x00*\x00method" => 'GET',
					"\x00*\x00parameters" => [],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => 'readCurrent',
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users/current',
					"\x00*\x00method" => 'GET',
					"\x00*\x00parameters" => [],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => 'read',
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users/<id>',
					"\x00*\x00method" => 'GET',
					"\x00*\x00parameters" => ['id' => ['requirement' => '\d+']],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => false,
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => 'patchCurrent',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users/current',
					"\x00*\x00method" => 'PATCH',
					"\x00*\x00parameters" => [],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => 'create',
						'GET' => false,
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users',
					"\x00*\x00method" => 'POST',
					"\x00*\x00parameters" => [],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => false,
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users/<id>',
					"\x00*\x00method" => 'PATCH',
					"\x00*\x00parameters" => ['id' => ['requirement' => '\d+']],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => false,
						'PUT' => false,
						'DELETE' => 'delete',
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users/<id>',
					"\x00*\x00method" => 'DELETE',
					"\x00*\x00parameters" => ['id' => ['requirement' => '\d+']],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => 'generateToken',
						'GET' => false,
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users/token',
					"\x00*\x00method" => 'POST',
					"\x00*\x00parameters" => [],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Users',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => false,
						'PUT' => 'resetPassword',
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/users/password',
					"\x00*\x00method" => 'PUT',
					"\x00*\x00parameters" => [],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
				\Nette\PhpGenerator\Dumper::createObject('Ublaboo\ApiRouter\ApiRoute', [
					'onMatch' => null,
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00presenter" => 'Api:V1:Items',
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00actions" => [
						'POST' => false,
						'GET' => 'read',
						'PUT' => false,
						'DELETE' => false,
						'OPTIONS' => false,
						'PATCH' => false,
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00default_actions" => [
						'POST' => 'create',
						'GET' => 'read',
						'PUT' => 'update',
						'DELETE' => 'delete',
						'OPTIONS' => 'options',
						'PATCH' => 'patch',
					],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00formats" => ['json' => 'application/json', 'xml' => 'application/xml'],
					"\x00Ublaboo\\ApiRouter\\ApiRoute\x00placeholder_order" => [],
					"\x00*\x00description" => null,
					"\x00*\x00path" => '/api/v1/items/<barcode>',
					"\x00*\x00method" => 'GET',
					"\x00*\x00parameters" => ['barcode' => ['requirement' => '\d+']],
					"\x00*\x00parameters_infos" => ['requirement', 'type', 'description', 'default'],
					"\x00*\x00priority" => 0,
					"\x00*\x00format" => 'json',
					"\x00*\x00example" => null,
					"\x00*\x00section" => null,
					"\x00*\x00tags" => [],
					"\x00*\x00response_codes" => [],
					"\x00*\x00disable" => false,
				]),
			]
		);
		return $service;
	}


	public function createServiceApplication__1(): App\Presenters\ActivityPresenter
	{
		$service = new App\Presenters\ActivityPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__2(): App\Presenters\ApiErrorPresenter
	{
		$service = new App\Presenters\ApiErrorPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->httpResponse = $this->getService('http.response');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__3(): App\Presenters\Error4xxPresenter
	{
		$service = new App\Presenters\Error4xxPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__4(): App\Presenters\ErrorPresenter
	{
		return new App\Presenters\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__5(): NetteModule\ErrorPresenter
	{
		return new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__6(): NetteModule\MicroPresenter
	{
		return new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('routing.router'));
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application(
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response')
		);
		$service->catchExceptions = false;
		$service->errorPresenter = 'ApiError';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel(
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('application.presenterFactory')
		));
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		return new Nette\Application\LinkGenerator(
			$this->getService('routing.router'),
			$this->getService('http.request')->getUrl()->withoutUserInfo(),
			$this->getService('application.presenterFactory')
		);
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback(
			$this,
			5,
			'/var/www/html/app/../temp/cache/nette.application/touch'
		));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		return $service;
	}


	public function createServiceAttributesValidator(): App\Utils\Json\AttributesValidator
	{
		return new App\Utils\Json\AttributesValidator;
	}


	public function createServiceCache__journal(): Nette\Caching\Storages\IJournal
	{
		return new Nette\Caching\Storages\SQLiteJournal('/var/www/html/app/../temp/cache/journal.s3db');
	}


	public function createServiceCache__storage(): Nette\Caching\IStorage
	{
		return new Nette\Caching\Storages\FileStorage('/var/www/html/app/../temp/cache', $this->getService('cache.journal'));
	}


	public function createServiceContainer(): Container_e0cf1c1dac
	{
		return $this;
	}


	public function createServiceDatabase__default__connection(): Nette\Database\Connection
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=test', null, null, ['lazy' => true]);
		$this->getService('tracy.blueScreen')->addPanel(['Nette\Bridges\DatabaseTracy\ConnectionPanel', 'renderException']);
		Nette\Database\Helpers::createDebugPanel($service, true, 'default');
		return $service;
	}


	public function createServiceDatabase__default__context(): Nette\Database\Context
	{
		return new Nette\Database\Context(
			$this->getService('database.default.connection'),
			$this->getService('database.default.structure'),
			$this->getService('database.default.conventions'),
			$this->getService('cache.storage')
		);
	}


	public function createServiceDatabase__default__conventions(): Nette\Database\Conventions\DiscoveredConventions
	{
		return new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
	}


	public function createServiceDatabase__default__structure(): Nette\Database\Structure
	{
		return new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		return $this->getService('http.requestFactory')->fromGlobals();
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		return new Nette\Http\Response;
	}


	public function createServiceJsonValidator(): App\Utils\Json\JsonValidator
	{
		return new App\Utils\Json\JsonValidator('/var/www/html/app/Models/schemas/');
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\ILatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\ILatteFactory {
			private $container;


			public function __construct(Container_e0cf1c1dac $container)
			{
				$this->container = $container;
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('/var/www/html/app/../temp/cache/latte');
				$service->setAutoRefresh();
				$service->setContentType('html');
				Nette\Utils\Html::$xhtml = false;
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): Nette\Application\UI\ITemplateFactory
	{
		return new Nette\Bridges\ApplicationLatte\TemplateFactory(
			$this->getService('latte.latteFactory'),
			$this->getService('http.request'),
			$this->getService('security.user'),
			$this->getService('cache.storage')
		);
	}


	public function createServiceMail__mailer(): Nette\Mail\Mailer
	{
		return new Nette\Mail\SendmailMailer;
	}


	public function createServiceRouterFactory(): App\Router\RouterFactory
	{
		return new App\Router\RouterFactory;
	}


	public function createServiceRouting__router(): Nette\Application\Routers\RouteList
	{
		return $this->getService('routerFactory')->createRouter();
	}


	public function createServiceSecurity__passwords(): Nette\Security\Passwords
	{
		return new Nette\Security\Passwords;
	}


	public function createServiceSecurity__user(): Nette\Security\User
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\IUserStorage
	{
		return new Nette\Http\UserStorage($this->getService('session.session'));
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		return Tracy\Debugger::getBar();
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		return Tracy\Debugger::getBlueScreen();
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		return Tracy\Debugger::getLogger();
	}


	public function initialize()
	{
		// di.
		(function () {
			$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		})();
		// http.
		(function () {
			$response = $this->getService('http.response');
			$response->setHeader('X-Powered-By', 'Nette Framework 3');
			$response->setHeader('Content-Type', 'text/html; charset=utf-8');
			$response->setHeader('X-Frame-Options', 'SAMEORIGIN');
			$response->setCookie('nette-samesite', '1', 0, '/', null, null, true, 'Strict');
		})();
		// session.
		(function () {
			$this->getService('session.session')->exists() && $this->getService('session.session')->start();
		})();
		// tracy.
		(function () {
			Tracy\Debugger::getLogger()->mailer = [new Tracy\Bridges\Nette\MailSender($this->getService('mail.mailer')), 'send'];
			$this->getService('session.session')->start();
			Tracy\Debugger::dispatch();
		})();
		$this->getService('apiRouter.resolver');
	}
}
