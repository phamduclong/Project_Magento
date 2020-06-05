<?php
namespace WebApi\Sanpham\Model;
use WebApi\Sanpham\Api\SanphamInterface;
use Magento\Framework\View\Element\Template;


class Sanpham extends Template implements SanphamInterface
{
    protected $_productCollectionFactory;

    public function __construct(

        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    )

    {


        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        //$collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function id($id) {
        $productCollection = $this->getProductCollection();
        foreach ($productCollection as $product) {
            //print_r($product->getData());
            // echo "<br>";
            //print_r($product->getData());
            //echo $product['entity_id'];
            //echo "<br>";
            if($product['entity_id'] == $id){
                //$name = $product['name'];
                /*$array['entity_id'] = $product['entity_id'];
                $array['sku'] = $product['sku'];
                $array['price'] = $product['price'];
                $array['special_price'] = $product['special_price'];*/
                $array = array(
                    'Id' => $product['entity_id'],
                    'Sku' => $product['sku'],
                    'Giá' => $product['price'],
                    'Giá Đặc Biệt' => $product['special_price'],
                    'Tên Sách' => $product['name'],
                    'meta_description' => $product['meta_description'],
                    'image' => $product['image'],
                    'country_of_manufacture' => $product['country_of_manufacture'],
                    'url_key' => $product['url_key'],
                    'Tác Giả' => $product['tacgia'],
                    'Nhà Cung Cấp' => $product['tennhacungcap'],
                    'NXB' => $product['nxb'],
                    'Năm XB' => $product['namxb'],
                    'Hình Thức' => $product['hinhthuc'],
                    'Mô Tả' => $product['description'],
                    'short_description' => $product['short_description'],
                );



            }
        }
        $arrayJSON = json_encode($array);
        return $array;
    }
}
