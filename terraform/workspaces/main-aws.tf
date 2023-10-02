terraform {

        backend "s3" {
                bucket          =  "application store"
                key             =  "03-key-tfstate"
                region          =  "us-east-1"
                dynamodb_table  =  "db_state"
                encrypt      =  true
                }
                
        required_providers {
                aws = {
                        source = "hashicorp/aws"
                        version = "~>3.0"
                        }
                }
        
        }

#setting workspace
locals {
environment_name  = terraform.workspace
}

#setting module (directory)
module "compute_app" {
        source = "../computeapp"

        bucket_name     = "abp.com.ng-bucket-${locals.environment_name}"
        domain          = "abp.com.ng"
        environment_name= locals.environment_name
        instance_type   = "t2.small"
        create_dns_zone  = terraform.workspace == "production" ? true : false


}