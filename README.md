# Pagination Cache plugin for CakePHP 3.x

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require brenoroosevelt/cakephp-pagination-cache
```
### Load the plugin

Add following to your `config/bootstrap.php`

```php
Plugin::load('BRPaginationCache');
```

## Usage

### Controller class

```php
public function index()
{

		// load component with setup param
		$this->loadComponent('BRPaginationCache.PaginationCache', [
				'session' => 'posts_pagination'
		]);
		
		// restore pagination from session
		$this->PaginationCache->restore();
		
		// pagination		
		$this->set('posts', $this->paginate($this->Posts));
		
		// save pagination from session
		$this->PaginationCache->save();
}
```
 
### Persisting pagination params (session)

All params are persisted using sessions. Make sure to load the Session component.
