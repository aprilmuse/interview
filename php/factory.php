<?php
Class Factory {
	public static function getProduct() {
		return new Product();
	}
}

Class Product {
	public function doing() {
		echo "doing something\n";
	}
}

$product = Factory::getProduct();
$product->doing();

/*
简单工厂模式(静态工厂方法模式)

使用工厂模式的好处是，如果你想要更改所实例化的类名等，则只需更改该工厂方法内容即可，不需逐一寻找代码中具体实例化的地方（new处）修改了。为系统结构提供灵活的动态扩展机制，减少了耦合。
*/
