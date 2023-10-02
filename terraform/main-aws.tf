terraform {

  backend "s3" {
    bucket         = "application store"
    key            = "03-key-tfstate"
    region         = "us-east-1"
    dynamodb_table = "db_state"
    encrypt        = true
  }

  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~>3.0"
    }
  }

}


provider "aws" {
  region = "us-east-1"
}


resource "aws_instance" "instance_1" {
  ami             = "ami_image_id"
  instance_type   = "t2.micro"
  security_groups = ["security_grp_1", "security_grp_2"]
  user_data       = <<-EOF
                                        #!/bin/bash
                                        echo "Hello app 1" > idenx.html
                                        npm start &
                                EOF
}

resource "aws_instance" "instance_2" {
  ami             = "ami_image_id"
  instance_type   = "t2.micro"
  security_groups = ["security_grp_1", "security_grp_2"]
  user_data       = <<-EOF
                                        #!/bin/bash
                                        echo "Hello app 2" > idenx.html
                                        pythin -m index.app -p:8081 &
                                EOF
}

resource "aws_s3_bucket" "images" {
  bucket        = "devops-directive-web-app-data"
  force_destroy = true
  versioning {
    enabled = true
  }

  server_side_encryption_configuration {
    rule {
      apply_server_side_encryption_by_default {
        sse_algorithm = "AES256"
      }
    }
  }
}

data "aws_vpc" "default_vpc" {
  default = true
}

data "aws_subnet_ids" "default_subnet" {
  vpc_id = data.aws_vpc.default_vpc.id
}

resource "aws_subnet_group" "instance" {
  name = "instance_security_group"
}

resource "aws_security_group_rule" "inbound_rules" {
  type              = "ingress"
  security_group_id = aws_security_group.instance_id
  from_port         = 8080
  to_port           = 8080
  protocol          = "tcp"
  cidr_blocks       = ["0.0.0.0/0"]

}


resource "aws_lb_listener" "http" {
  load_balancer_arn = aws.lb.load_balancer.arn
  port              = 80
  protocol          = "HTTP"

  default_action {

    type = "fixed-response"

    fixed_response {
      content_type = "text/plain"
      message_body = "404: page not found"
      status_code  = 404
    }
  }
}

resource "aws_route53_record" "root" {
  zone_id = aws_route53.zone.primary.zone_id
  name    = "abp.com.ng"
  type    = "A"

  alias {
    name                   = aws_lb.load_balancer.dns_name
    zone_id                = aws_lb.load_balancer.zone_id
    evaluate_target_health = true
  }
}
