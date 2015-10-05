# PHP SEO MODEL FOR CODEIGNITER FW

<h3>Howto</h3>

<b>1, First create table</b>
<pre>
CREATE TABLE IF NOT EXISTS `seo_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `og_title` varchar(256) NOT NULL,
  `og_image` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
</pre>

<b>2, Insert to table some data</b>
<pre>
INSERT INTO `seo_data` 
(`id`, `url`, `title`, `description`, `keywords`, `og_title`, `og_image`) 
VALUES 
('1', 'contact', 'Contact', 'Description of contact', 'lorem, ipsum', 'Contact', 'https://9to5google.files.wordpress.com/2014/10/google-building.jpg?w=704');
</pre>

<b>3, Usage</b><br/>
in your controller:
<pre>
$this->load->model('Seo_model');
$data = $this->Seo_model->get(get_class($this));
</pre>
